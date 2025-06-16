<?php
return [
    "city" => [
        "{location} is ranked {rank} out of the 800+ district/state capitals of India, with {value} {metric} in {field}. {line}",
        "{location} ranks {rank} in India out of the 800+ district/state capitals, with {value} {metric} in {field}. {line}",
        "{location} holds the {rank} position out of 800+ cities and districts in India for {field}, witch is {value} {metric}. {line}",
        "out of 800+ cities and districts in India, {location} holds the {rank} spot in terms of {field}, with {value} {metric}. {line}",
        "{location} ranks {rank} in {field} compared to 800+ other cities and districts in India, with {value} {metric}. {line}",
        "{location}, standing at rank {rank} among 800+ cities and districts, reported {value} {metric} in {field}. {line}",
        "among India's 800+ district/state capitals, {location} is placed at {rank} in {field}, showing a record of {value} {metric}. {line}",
        "{location} ranks {rank} out of 800+ cities and districts, with a recorded {value} {metric} for {field}. {line}",
    ],


    "country" => [
        "{location} stands at rank {rank} out of 195 countries in terms of {field}, with {value} {metric}. {line}",
        "{location}, with {value} {metric}, is ranked {rank} globally out of 195 countries in {field}. {line}",
        "{location}'s {field} is {value} {metric}, placing it at rank {rank} among 195 countries. {line}",
        "{location} ranks {rank} out of 195 countries worldwide for {field}, recorded at {value} {metric}. {line}",
        "based on recent international data, {location} reports {value} {metric} in {field}, securing position {rank} out of 195 countries. {line}",
        "in the global index, {location} is ranked {rank} out of 195 countries for {field}, with {value} {metric}. {line}",
        "based on international statistics, {location} ranks {rank} out of 195 countries in {field}, showing {value} {metric}. {line}",
        "as per international rankings, {location} holds the {rank} spot globally in {field}, with {value} {metric}. {line}",
        "among all 195 nations, {location} stands at {rank} in {field}, reflecting a performance of {value} {metric}. {line}",
        "out of 195 countries, {location} is placed at rank {rank} in {field}, marked at {value} {metric}. {line}",
        "{location} holds the {rank} rank globally out of 195 countries for {field}, reporting {value} {metric}. {line}",
    ],



    'continent' => [
        " {location}  holds the {rank} position out of 7 the world regions in terms of {field}, with a recorded value of {value}. {line}",
        "{field} of {value}, {location}   is ranked {rank} out of the 7 global regions. {line}",
        "according to data, {location}   stands at rank {rank} out of the 7 regions in {field}, with a value of {value}. {line}",
        " {location}  is placed {rank} out of the 7 regions in {field}, with a value of {value}. {line}",
        "based on intercontinental comparisons, {location}   holds the {rank} rank out of the 7 world regions in {field}, recording a value of {value}. {line}",
        " {location} 's {field} is marked at {value}, placing it at rank {rank} out of the 7 regions. {line}",
        "among all 7 world regions, {location}   is ranked {rank} in {field}, with a recorded value of {value}. {line}",
        // "ranked {rank} out of the 7 world regions in terms of {field}, {location}   has a value of {value}. {line}",
        "the value of {field} in {location}   is {value}, placing it at position {rank} out of the 7 global regions. {line}"
    ],

    'state' => [
        "{location} holds the {rank} rank out of the 28 States and 8 Union Territories in {field}, recording {value} {metric}. {line}",
        "{field} measured at {value} {metric}, {location} stands at position {rank} among the 28 States and 8 UTs. {line}",
        "according to data, {location} is ranked {rank} out of 36 States and Union Territories in {field}, with {value} {metric}. {line}",
        "among India's 28 States and 8 UTs, {location} is placed at rank {rank} in {field}, reported at {value} {metric}. {line}",
        "based on recent statistics, {location} holds the {rank} position out of 36 Indian States and UTs in {field}, recorded at {value} {metric}. {line}",
        "{location} has reported {value} {metric} in {field}, placing it at rank {rank} among all 28 States and 8 UTs. {line}",
        "{location} ranks {rank} in {field} among the 36 Indian States and Union Territories, with a level of {value} {metric}. {line}",
        // "In comparison to the 28 States and 8 UTs of India, {location} stands at rank {rank} in {field}, having recorded {value} {metric}. {line}",
        "among all Indian States and Union Territories, {location} secures the {rank} spot in {field} with {value} {metric}. {line}",
    ],


    'uts' => [
        "Within India, {location}   holds the {rank} rank out of 8 Union Territories in {field}, recording a value of {value}. {line}",
        "With a {field} of {value}, {location}   stands at position {rank} out of 8 UTs. {line}",
        "According to data, {location}   is ranked {rank} out of 8 Union Territories in {field}, with a value of {value}. {line}",
        "Among India's 8 Union Territories, {location}   is ranked {rank} in {field}, based on a value of {value}. {line}",
        "Based on recent statistics, {location}   holds the {rank} position out of 8 UTs in {field}, with a value of {value}. {line}",
        "The Union Territory of {location}   has a recorded value of {value} in {field}, placing it at rank {rank} out of 8 UTs. {line}"
    ],

    'prompt' => [
        "Compare :cities in terms of :filters.",
    ],

    'cityOnlyPrompt' => [
        "Comparison :cities in terms  of ? ,?",
    ],

    'filterOnlyPrompt' => [
        "let's Compare ? v/s ? in terms of :filters.",
    ],

    'differ_warning' => [
        'city_state' => 'Please note that in the geographies selected for comparison here, some are Cities which are District or State Capitals of India and  some are States. Do note that apart from size and population, the political boundaries of governance often define what metrics are measured & when they are measured. The source & date/year of data collection is noteworthy for any linear comparison.',

        'city_country' => 'Please note that in the geographies selected for comparison here, some are Cities which are District or State Capitals of India and some are Countries. Do note that apart from size and population, the political boundaries of governance often define what metrics are measured & when they are measured. The source & date/year of data collection is noteworthy for any linear comparison.',

        'state_country' => 'Please note that in the geographies selected for comparison here, some are States of India and some are Countries. Do note that apart from size and population, the political boundaries of governance often define what metrics are measured & when they are measured. The source & date/year of data collection is noteworthy for any linear comparison.',

        'country_continent' => 'Please note that in the geographies selected for comparison here, some are Countries and some are  Continents. Do note that apart from size and population, the political boundaries of governance often define what metrics are measured & when they are measured. The source & date/year of data collection is noteworthy for any linear comparison.',

        'city_continent' => 'Please note that in the geographies selected for comparison here, some are Cities which are District or State Capitals of India and some are Continents. Do note that apart from size and population, the political boundaries of governance often define what metrics are measured & when they are measured. The source & date/year of data collection is noteworthy for any linear comparison.',

        'state_continent' => 'Please note that in the geographies selected for comparison here, some are Cities which are District or State Capitals of India, some are States and some are Countries (and Continents). Do note that apart from size and population, the political boundaries of governance often define what metrics are measured & when they are measured. The source & date/year of data collection is noteworthy for any linear comparison.',

        'city_state_country' => 'Please note that in the geographies selected for comparison here, some are Cities which are District or State Capitals of India, some are States and some are Countries (and Continents). Do note that apart from size and population, the political boundaries of governance often define what metrics are measured & when they are measured. The source & date/year of data collection is noteworthy for any linear comparison.',
    ],




    'differ' => [
        '2_city' => 'Both :location1 and :location2 are districts capitals of India.',
        '1_city_1_country' => 'Here is a comparison between :location1, a districts capital of India, and :location2, a country capital of :country2 in :continent2.',
        '2_country' => 'Both :location1 and :location2 are country capitals of :country1 and :country2 respectively.',


        '3_city' => 'Here is a comparison between :location1, :location2, and :location3 — all districts capitals of India.',
        '2_city_1_country' => 'Here is a comparison between :location1 and :location2, districts capitals of India, and :location3, a country capital of :country3 in :continent3.',
        '1_city_2_country' => 'Here is a comparison between :location1, a districts capital of India, and :location2 and :location3 — country capitals of :country2 and :country3.',
        '3_country' => 'Here is a comparison between :location1, :location2, and :location3 — all country capitals of :country1, :country2, and :country3.',

        '4_city' => 'Here is a comparison of :location1, :location2, :location3, and :location4 — all districts capitals of India.',
        '3_city_1_country' => 'Here is a comparison of :location1, :location2, and :location3 — districts capitals of India — and :location4, a country capital of :country4.',
        '2_city_2_country' => 'Here is a comparison between :location1 and :location2, districts capitals of India, and :location3 and :location4, country capitals of :country3 and :country4.',
        '1_city_3_country' => 'Here is a comparison between :location1, a districts capital of India, and :location2, :location3, and :location4 — country capitals of :country2, :country3, and :country4.',
        '4_country' => 'Here is a comparison between :location1, :location2, :location3, and :location4 — all country capitals of :country1, :country2, :country3, and :country4.',


        '5_city' => 'Here is a comparison between :location1, :location2, :location3, :location4, and :location5 — all districts capitals of India.',
        '4_city_1_country' => 'Here is a comparison between :location1, :location2, :location3, and :location4 — districts capitals of India — and :location5, a country capital of :country5.',
        '3_city_2_country' => 'Here is a comparison between :location1, :location2, and :location3 — districts capitals of India — and :location4 and :location5, country capitals of :country4 and :country5.',
        '2_city_3_country' => 'Here is a comparison between :location1 and :location2 — districts capitals of India — and :location3, :location4, and :location5 — country capitals of :country3, :country4, and :country5.',
        '1_city_4_country' => 'Here is a comparison between :location1, a districts capital of India, and :location2, :location3, :location4, and :location5 — country capitals of :country2, :country3, :country4, and :country5.',
        '5_country' => 'Here is a comparison between :location1, :location2, :location3, :location4, and :location5 — all country capitals of :country1, :country2, :country3, :country4, and :country5.',
    ],

    'pop_area' => [
        ":location covers an area of :area km² with a population of :population",
        "the size of :location is :area km², and its population is :population",
        ":location is spread across :area km² and inhabited by :population people",
        ":location has an area of :area km² and a population of :population",
    ],

    'comparison' => [
        'pop'  => ":smaller's population is :percent%  of :larger's population",
        'area' => ":smaller's area is :percent% of :larger's area",
    ],

    'city_data' => [
        "{City} stands at rank {Rank} out of 768 District Capitals (DHQs) in India in terms of population. It is the capital of {District} District in {State} State. {District} District ranks {District_Population_Rank} in population and {Area_Rank} in area across India."       
    ],

];
