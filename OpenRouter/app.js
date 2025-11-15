import 'dotenv/config';
import express from 'express';
import axios from 'axios';

const app = express();
app.use(express.json());

// 🔑 Base OpenRouter API
const OPENROUTER_API = 'https://openrouter.ai/api/v1/chat/completions';
const headers = {
    'Authorization': `Bearer ${process.env.OPENROUTER_API_KEY}`,
    'HTTP-Referer': 'https://prarang.in/', // optional
    'X-Title': 'Parallel LLM Service',
    'Content-Type': 'application/json',
};

// 🧠 Helper to call a model
async function callModel(model, prompt) {
    try {
        const res = await axios.post(
            OPENROUTER_API,
            {
                model,
                messages: [{ role: 'user', content: prompt }],
            },
            { headers, timeout: 30000 } // 30 second timeout
        );
        return res.data.choices[0].message.content;
    } catch (error) {
        console.error(`❌ Model: ${model}`);
        console.error(`Status: ${error.response?.status}`);
        console.error(`Error: ${error.response?.data?.error?.message || error.message}`);
        throw error;
    }
}

// 🚀 POST /run
app.post('/run', async (req, res) => {
    const { prompt, models } = req.body;

    if (!prompt || !models || !Array.isArray(models)) {
        return res.status(400).json({
            error: "Invalid request. Expected { prompt: string, models: string[] }"
        });
    }

    // Set long timeout for response (5 minutes)
    req.setTimeout(5 * 60 * 1000);
    res.setTimeout(5 * 60 * 1000);

    try {
        console.log(`🔄 Processing ${models.length} models...`);
        const startTime = Date.now();

        // Run all models in parallel and wait for ALL to complete
        const results = await Promise.allSettled(
            models.map(async (model) => {
                const modelStartTime = Date.now();
                try {
                    console.log(`⏳ Calling ${model}...`);
                    const output = await callModel(model, prompt);
                    const duration = ((Date.now() - modelStartTime) / 1000).toFixed(2);
                    console.log(`✅ ${model} completed in ${duration}s`);
                    return { model, output, status: 'success', duration };
                } catch (err) {
                    const duration = ((Date.now() - modelStartTime) / 1000).toFixed(2);
                    console.error(`❌ ${model} failed in ${duration}s:`, err.message);
                    return { model, output: `Error: ${err.message}`, status: 'error', duration };
                }
            })
        );

        // Convert Promise.allSettled results to consistent format
        const processedResults = results.map((result) => {
            if (result.status === 'fulfilled') {
                return result.value;
            } else {
                return {
                    model: 'unknown',
                    output: `Error: ${result.reason?.message || 'Failed'}`,
                    status: 'error',
                    duration: 'N/A'
                };
            }
        });

        const totalDuration = ((Date.now() - startTime) / 1000).toFixed(2);
        console.log(`✨ All models completed in ${totalDuration}s`);

        return res.json({
            prompt,
            total_duration: `${totalDuration}s`,
            total_models: models.length,
            successful: processedResults.filter(r => r.status === 'success').length,
            failed: processedResults.filter(r => r.status === 'error').length,
            responses: processedResults,
        });

    } catch (error) {
        console.error('❌ Unexpected error:', error.message);
        res.status(500).json({ error: 'Internal Server Error', message: error.message });
    }
});

app.get('/', (req, res) => {
    res.send('🤖 AI Parallel Service is Running...');
});

const PORT = process.env.PORT || 4000;
app.listen(PORT, () => console.log(`🚀 AI Service running on port ${PORT}`));
