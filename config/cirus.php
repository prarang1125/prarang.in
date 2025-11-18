<?php

return [
    /*
    |--------------------------------------------------------------------------
    | CIRUS India Configuration
    |--------------------------------------------------------------------------
    |
    | Configuration for India (DHQ/Districts) data fields, tooltips and labels
    |
    */
    'india' => [
        'tooltips' => [
            'risk_index' => 'The Cyber Risk Index is calculated by ranking 800+ State / District Capitals across ten selected metrics, averaging these ranks, and standardizing the result on a 0–10 scale to represent relative State / District Capital level cyber risk within India.',
            'internet_penetration' => 'Percentage of total population with active internet subscriptions. (As per TRAI, June 2025)',
            'internet_audience_literate' => 'Share of literate individuals with internet access. (Derived from TRAI, June 2025 and Census 2011)',
            'facebook_audience_literate' => 'Percentage of literate individuals using Facebook. (As per Facebook Ad Module, September 2025)',
            'facebook_audience_internet' => 'Percentage of internet subscribers using Facebook. (As per Facebook Ad Module, September 2025; TRAI, June 2025)',
            'linkedin_audience_literate' => 'Percentage of literate individuals using LinkedIn. (As per LinkedIn Ad Module, September 2025)',
            'linkedin_audience_internet' => 'Percentage of internet subscribers using LinkedIn. (As per LinkedIn Ad Module, September 2025; TRAI, June 2025)',
            'linkedin_audience_formal_employment' => 'Number of LinkedIn users per 100 formally employed persons. (Derived from LinkedIn Ad Module, September 2025; MoSPI 2023)',
            'linkedin_per_100_formal_employees' => 'LinkedIn Audience (per 100 Formal Employees)',
            'twitter_audience_literate' => 'Percentage of literate individuals using Twitter (X). (As per Twitter Ad Module, September 2025)',
            'twitter_audience_internet' => 'Percentage of internet subscribers using Twitter (X). (As per Twitter Ad Module, September 2025; TRAI, June 2025)',
            'cyber_crime_rate_per_1000' => 'Number of reported cyber crime cases per million internet users. (As per NCRB IPC 2022 and TRAI, June 2025)',
            'cyber_crime_rate' => 'Cyber Crime Rate (per \'000 Internet Subscribers)',
            'instagram_audience_literate' => 'Percentage of literate individuals using LinkedIn. (As per LinkedIn Ad Module, September 2025)',
            'instagram_audience_internet' => 'Percentage of internet subscribers using Instagram. (As per Facebook Ad Module, September 2025; TRAI, June 2025)',

        ],

        'field_labels' => [
            'state_district_capital' => 'State / District Capital',
            'state_ut' => 'State / UT',
            'risk_index' => 'Cyber Risk Index',
            'internet_penetration' => 'Internet Penetration (%)',
            'internet_audience_literate' => 'Internet Audience (% of Literate Population)',
            'facebook_audience_literate' => 'Facebook Audience (% of Literate Population)',
            'facebook_audience_internet' => 'Facebook Audience (% of Internet Subscribers)',
            'linkedin_audience_literate' => 'LinkedIn Audience (% of Literate Population)',
            'linkedin_audience_internet' => 'LinkedIn Audience (% of Internet Subscribers)',
            'linkedin_per_100_formal_employees' => 'LinkedIn Audience (per 100 Formal Employees)',
            'linkedin_audience_formal_employment' => 'LinkedIn Audience (per 100 Formal Employees)',
            'twitter_audience_literate' => 'Twitter Audience (% of Literate Population)',
            'twitter_audience_internet' => 'Twitter Audience (% of Internet Subscribers)',
            'cyber_crime_rate_per_1000' => 'Cyber Crime Rate (per \'000 Internet Subscribers)',
            'cyber_crime_rate' => 'Cyber Crime Rate (per \'000 Internet Subscribers)',
            'cyber_risk_rank' => 'Cyber Risk Rank',
            'instagram_audience_literate' => 'Instagram Audience (% of Literate Population)',
            'instagram_audience_internet' => 'Instagram Audience (% of Internet Subscribers)',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | CIRUS World Configuration
    |--------------------------------------------------------------------------
    |
    | Configuration for World (Countries/Continents) data fields, tooltips and labels
    |
    */
    'world' => [
        'tooltips' => [
            'risk_index' => 'The Cyber Risk Index is calculated by ranking 195 Countries across eight selected metrics, averaging these ranks, and standardizing the result on a 0–10 scale to represent relative global cyber risk.',
            'cyber_risk_index' => 'The Cyber Risk Index is calculated by ranking 195 Countries across eight selected metrics, averaging these ranks, and standardizing the result on a 0–10 scale to represent relative global cyber risk.',
            'cyber_risk_rank' => 'Global ranking based on Cyber Risk Index score.',
            'internet_penetration_percent' => 'Percentage of total population with active internet subscriptions. (As per UN ICT Data, 2024)',
            'internet_subscribers_pop' => 'Percentage of total population with active internet subscriptions. (As per UN ICT Data, 2024)',
            'internet_audience_percent_literate' => 'Percentage of literate individuals with active internet subscriptions. (Derived from UN ICT Data, 2024 and CIA World Factbook, 2022)',
            'internet_subscribers_literate' => 'Percentage of literate individuals with active internet subscriptions. (Derived from UN ICT Data, 2024 and CIA World Factbook, 2022)',
            'facebook_audience_percent_literate' => 'Percentage of literate individuals using Facebook. (As per Facebook Ad Module, September 2025)',
            'facebook_literate' => 'Percentage of literate individuals using Facebook. (As per Facebook Ad Module, September 2025)',
            'facebook_audience_percent_internet' => 'Percentage of internet subscribers who use Facebook. (As per Facebook Ad Module, September 2025; UN ICT Data, 2024)',
            'facebook_internet' => 'Percentage of internet subscribers who use Facebook. (As per Facebook Ad Module, September 2025; UN ICT Data, 2024)',
            'linkedin_audience_percent_literate' => 'Percentage of literate individuals using LinkedIn. (As per LinkedIn Ad Module, September 2025)',
            'linkedin_literate' => 'Percentage of literate individuals using LinkedIn. (As per LinkedIn Ad Module, September 2025)',
            'linkedin_audience_percent_internet' => 'Percentage of internet subscribers who use LinkedIn. (As per LinkedIn Ad Module, September 2025; UN ICT Data, 2024)',
            'linkedin_internet' => 'Percentage of internet subscribers who use LinkedIn. (As per LinkedIn Ad Module, September 2025; UN ICT Data, 2024)',
            'linkedin_audience_per_100_formal_employees' => 'Number of LinkedIn users per 100 formally employed persons. (Derived from LinkedIn Ad Module, September 2025)',
            'twitter_audience_percent_literate' => 'Percentage of literate individuals using Twitter (X). (As per Twitter Ad Module, September 2025)',
            'twitter_literate' => 'Percentage of literate individuals using Twitter (X). (As per Twitter Ad Module, September 2025)',
            'twitter_audience_percent_internet' => 'Percentage of internet subscribers who use Twitter (X). (As per Twitter Ad Module, September 2025; UN ICT Data, 2024)',
            'twitter_internet' => 'Percentage of internet subscribers who use Twitter (X). (As per Twitter Ad Module, September 2025; UN ICT Data, 2024)',
            'cyber_crime_rate_per_1000_internet' => 'Number of reported cyber crime cases per thousand internet users globally.',
            'instagram_literate' => 'Percentage of literate individuals using Instagram. (As per Facebook Ad Module, October 2025)',
            'instagram_internet' => 'Percentage of internet subscribers who use Instagram. (As per Facebook Ad Module, October 2025; UN ICT Data, 2024)',
        ],

        'field_labels' => [
            'country' => 'Country',
            'continent' => 'Continent',
            'risk_index' => 'Cyber Risk Index',
            'cyber_risk_index' => 'Cyber Risk Index',
            'cyber_risk_rank' => 'Cyber Risk Rank',
            'internet_penetration_percent' => 'Internet Penetration (%)',
            'internet_subscribers_pop' => 'Internet Subscribers (% of Population)',
            'internet_audience_percent_literate' => 'Internet Audience (% of Literate Population)',
            'internet_subscribers_literate' => 'Internet Subscribers (% of Literate Population)',
            'facebook_audience_percent_literate' => 'Facebook Audience (% of Literate Population)',
            'facebook_literate' => 'Facebook Users (% of Literate Population)',
            'facebook_audience_percent_internet' => 'Facebook Audience (% of Internet Subscribers)',
            'facebook_internet' => 'Facebook Users (% of Internet Subscribers)',
            'linkedin_audience_percent_literate' => 'LinkedIn Audience (% of Literate Population)',
            'linkedin_literate' => 'LinkedIn Users (% of Literate Population)',
            'linkedin_audience_percent_internet' => 'LinkedIn Audience (% of Internet Subscribers)',
            'linkedin_internet' => 'LinkedIn Users (% of Internet Subscribers)',
            'linkedin_audience_per_100_formal_employees' => 'LinkedIn Audience (per 100 Formal Employees)',
            'twitter_audience_percent_literate' => 'Twitter Audience (% of Literate Population)',
            'twitter_literate' => 'Twitter Users (% of Literate Population)',
            'twitter_audience_percent_internet' => 'Twitter Audience (% of Internet Subscribers)',
            'twitter_internet' => 'Twitter Users (% of Internet Subscribers)',
            'cyber_crime_rate_per_1000_internet' => 'Cyber Crime Rate (per \'000 Internet Subscribers)',
            'instagram_literate' => 'Instagram Users (% of Literate Population)',
            'instagram_internet' => 'Instagram Users (% of Internet Subscribers)',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Column Order Configuration
    |--------------------------------------------------------------------------
    |
    | Define the order of columns for different views
    |
    */
    'column_order' => [
        'india_top_dhq' => [
            'state_district_capital',
            'state_ut',
            'risk_index',
            'internet_penetration',
            'internet_audience_literate',
            'facebook_audience_literate',
            'facebook_audience_internet',
            'linkedin_audience_literate',
            'linkedin_audience_internet',
            'linkedin_audience_formal_employment',
            'twitter_audience_literate',
            'twitter_audience_internet',
            'cyber_crime_rate_per_1000',
            'cyber_risk_rank',
        ],

        'india_comparison' => [
            'state_district_capital',
            'state_ut',
            'cyber_risk_index',
            'internet_penetration_percent',
            'internet_audience_percent_literate',
            'facebook_audience_percent_literate',
            'facebook_audience_percent_internet',
            'linkedin_audience_percent_literate',
            'linkedin_audience_percent_internet',
            'linkedin_audience_per_100_formal_employees',
            'twitter_audience_percent_literate',
            'twitter_audience_percent_internet',
            'cyber_crime_rate_per_1000_internet',
        ],

        'world_top_countries' => [
            'country',
            'cyber_risk_index',
            'internet_penetration_percent',
            'internet_audience_percent_literate',
            'facebook_audience_percent_literate',
            'facebook_audience_percent_internet',
            'linkedin_audience_percent_literate',
            'linkedin_audience_percent_internet',
            'linkedin_audience_per_100_formal_employees',
            'twitter_audience_percent_literate',
            'twitter_audience_percent_internet',
            'cyber_crime_rate_per_1000_internet',
        ],

        'world_comparison' => [
            'country',
            'cyber_risk_index',
            'internet_penetration_percent',
            'internet_audience_percent_literate',
            'facebook_audience_percent_literate',
            'facebook_audience_percent_internet',
            'linkedin_audience_percent_literate',
            'linkedin_audience_percent_internet',
            'linkedin_audience_per_100_formal_employees',
            'twitter_audience_percent_literate',
            'twitter_audience_percent_internet',
            'cyber_crime_rate_per_1000_internet',
        ],
    ],
];
