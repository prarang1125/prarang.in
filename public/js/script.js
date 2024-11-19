// Array to keep track of selected days to disable them in other dropdowns
let selectedDays = [];

// Function to duplicate the day template for adding a new day
function addNewDay() {
    const container = document.getElementById('day-schedule-container');
    const template = document.getElementById('day-template').cloneNode(true);

    // Set attributes for cloned elements to avoid ID duplication and ensure array input
    template.style.display = 'block';
    template.removeAttribute('id');
    template.querySelector('.day-select').setAttribute('name', 'day[]');
    template.querySelector('.day-open').setAttribute('name', 'open_time[]');
    template.querySelector('.day-close').setAttribute('name', 'close_time[]');
    template.querySelector('.day-open-2').setAttribute('name', 'open_time_2[]');
    template.querySelector('.day-close-2').setAttribute('name', 'close_time_2[]');
    template.querySelector('.day-24hours').setAttribute('name', 'is_24_hours[]');
    template.querySelector('.day-2nd-slot-toggle').setAttribute('name', 'add_2nd_time_slot[]');

    container.appendChild(template);

    updateDayOptions();
}


// Function to update the dropdown options for all day selects to exclude selected days
function updateDayOptions() {
    const daySelects = document.querySelectorAll('.day-select');
    daySelects.forEach(select => {
        Array.from(select.options).forEach(option => {
            if (selectedDays.includes(option.value)) {
                option.disabled = true;
            } else {
                option.disabled = false;
            }
        });
    });
}

// Function to handle day selection and update label and selectedDays array
function updateDaySelection(selectElement) {
    const dayLabel = selectElement.closest('div').querySelector('.day-label');
    const selectedDay = selectElement.value;
    const prevSelectedDay = selectElement.dataset.prevSelectedDay;

    // Remove the previously selected day if changed
    if (prevSelectedDay && prevSelectedDay !== selectedDay) {
        const index = selectedDays.indexOf(prevSelectedDay);
        if (index > -1) selectedDays.splice(index, 1);
    }

    // Add new selection to selected days
    if (selectedDay) {
        if (!selectedDays.includes(selectedDay)) {
            selectedDays.push(selectedDay);
        }
        dayLabel.textContent = selectedDay.charAt(0).toUpperCase() + selectedDay.slice(1) + " Opening:";
    }

    // Update the previously selected day and refresh dropdown options
    selectElement.dataset.prevSelectedDay = selectedDay;
    updateDayOptions();
}


// Function to toggle 24 hours option
function toggle24Hours(checkbox) {
    const container = checkbox.closest('div');
    container.querySelector('.day-open').disabled = checkbox.checked;
    container.querySelector('.day-close').disabled = checkbox.checked;
}

// Function to toggle the display of the second time slot
function toggleSecondSlot(checkbox) {
    const secondSlot = checkbox.closest('div').nextElementSibling;
    secondSlot.style.display = checkbox.checked ? 'flex' : 'none';
}

// Wait for the DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    // Add event listener to the button
    document.getElementById('addSocialMedia').addEventListener('click', function() {
        // Create a new row for social media input
        const newRow = document.createElement('div');
        newRow.className = 'social-media-row';
        newRow.style.display = 'flex';
        newRow.style.alignItems = 'center';
        newRow.style.gap = '10px';
        newRow.style.marginBottom = '10px';

        // Create the dropdown for social media
        const socialMediaSelect = document.createElement('select');
        socialMediaSelect.name = 'social_media[]';
        socialMediaSelect.required = true;
        socialMediaSelect.style.flex = '1';
        socialMediaSelect.style.padding = '8px';

        const options = [
            { value: '', text: '-- Select a Platform --' },
            { value: 'facebook', text: 'Facebook' },
            { value: 'twitter', text: 'Twitter' },
            { value: 'instagram', text: 'Instagram' },
            { value: 'linkedin', text: 'LinkedIn' },
            { value: 'youtube', text: 'YouTube' },
        ];

        options.forEach(option => {
            const opt = document.createElement('option');
            opt.value = option.value;
            opt.textContent = option.text;
            socialMediaSelect.appendChild(opt);
        });

        // Create the description input
        const descriptionInput = document.createElement('input');
        descriptionInput.type = 'text';
        descriptionInput.name = 'description[]';
        descriptionInput.placeholder = 'Enter your link or details';
        descriptionInput.style.flex = '2';
        descriptionInput.style.padding = '8px';

        newRow.appendChild(socialMediaSelect);
        newRow.appendChild(descriptionInput);

        document.getElementById('socialMediaForm').appendChild(newRow);
    });

    document.getElementById('featuresToggle').addEventListener('change', function() {
        document.getElementById('faqSection').style.display = this.checked ? 'block' : 'none';
    });

    function addFAQ() {
        const faqSection = document.getElementById('faqSection');
        const faqItem = document.createElement('div');
        faqItem.className = 'faq-item';
        faqItem.style.marginBottom = '10px';
        faqItem.innerHTML = `
            <input type="text" placeholder="Frequently Asked Questions" style="width: 100%; margin-bottom: 5px;">
            <textarea placeholder="Answer" style="width: 100%; height: 60px;"></textarea>
        `;
        faqSection.insertBefore(faqItem, faqSection.querySelector('.add-new'));
    }

    document.getElementById('existingAccountCheckbox').addEventListener('change', function() {
        const signupFields = document.getElementById('signupFields');
        const accountFields = document.getElementById('accountFields');

        if (this.checked) {
            signupFields.style.display = 'none';
            accountFields.style.display = 'flex';
        } else {
            signupFields.style.display = 'flex';
            accountFields.style.display = 'none';
        }
    });
});
