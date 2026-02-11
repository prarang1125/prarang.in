module.exports = {
  apps: [
    {
      name: "ai-service",
      script: "app.js",
      env: {
        NODE_ENV: "production",
        OPENROUTER_API_KEY_2: "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",
        OPENROUTER_API_KEY_3: "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",
        OPENROUTER_API_KEY_4: "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"
      }
    }
  ]
};

