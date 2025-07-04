<div wire:id="upman-sidebar">
    <style>
        /* Col 2 */
        .first-prompt .firstPrompt .col-sm-2 {
            padding-left: 0px;
            padding-right: 0px;
            transform: translatex(0px) translatey(0px);
        }

        /* Border dark */
        .first-prompt div .border-dark {
            padding-left: 7px !important;
            padding-right: 4px !important;
            padding-top: 4px !important;
            padding-bottom: 4px !important;
            width: 183px;
            text-align: left;
            font-size: 15px;
            margin-bottom: 21px;
            border-style: none !important;
            box-shadow: 0px 0px 5px 0px #212529;
            position: relative;
            top: 1px;
            transform: translatex(0px) translatey(0px);
        }

        /* Division */
        .first-prompt .firstPrompt .row .col-sm-2>div {
            position: relative;
            top: -90px;
        }

        /* List Item */
        .first-prompt ul li {
            text-decoration: none;
        }

        /* Link */
        .first-prompt ul a {
            text-decoration: none;
        }

        @media (min-width:768px) {

            /* Border dark */
            .first-prompt div .border-dark {
                display: block !important;
            }

        }

        /* Link */
        .first-prompt ul a {
            color: #024abe;
        }

        /* Link (hover) */
        .first-prompt ul a:hover {
            color: #031d90;
            font-weight: bold;
        }

        /* Paragraph */
        .row .col-sm-2 div .border-dark p {
            margin-bottom: 2px;
            margin-top: 3px;
            font-size: 14px;
        }

        /* List */
        .first-prompt div ul {
            padding-left: 0px !important;
            margin-bottom: 0px;
        }

        /* Link */
        .first-prompt ul a {
            font-size: 14px;
        }

        /* Link */
        .first-prompt ul a {
            display: flex;
        }

        /* Popupregister */
        #popupregister {
            transform: translatex(0px) translatey(0px);
        }

        /* Text gray (hover) */
        .first-prompt ul .text-gray:hover {
            color: #024abe;
        }

        /* Text primary */
        .border-dark ul li .text-gray .text-primary {
            color: #024abe !important;
        }

        /* Text gray */
        .first-prompt ul .text-gray {
            color: #024abe;
        }

        /* Heading */
        #whatIsUpmanaModal ul h5 {
            font-size: 17px;
        }

        /* Paragraph */
        #whatIsUpmanaModal ul p {
            font-size: 15px;
        }

        /* Paragraph */
        #whatIsUpmanaModal section p {
            font-size: 15px;
        }

        /* Modal header */
        .modal .modal-header {
            text-align: center;
            justify-content: center;

            padding-top: 8px;
            padding-bottom: 6px;
        }

        /* What upmana label */
        .modal {
            width: 100% !important;
        }

        /* Span Tag */
        .pr1c {
            color: #0000FF;
            font-size: 30px;
        }

        .pr2c {
            color: #FFFF00;
            font-size: 30px;
        }

        .pr3c {
            color: #FF0000;
            font-size: 30px;
        }

        /* What upmana label */


        /* Span Tag */
        .pr1c,
        .pr2c,
        .pr3c {
            position: relative;
            top: 2px;
        }

        /* Heading */
        .modal .modal-header h5 {
            width: 100% !important;
        }

        /* Th */
        #upmanabenefitsModal tr th {
            text-align: center;
        }

        /* Heading */
        #whatIsUpmanaModal ul h5 {
            color: #0000ff;
            font-weight: 500;
            font-size: 15px !important;
        }

        /* Strong Tag */
        #whatIsUpmanaModal p strong {
            color: #0000ff;
        }

        /* Bold Tag */
        #upmanabenefitsModal p b {
            color: #0000ff;
        }

        /* Strong Tag */
        #upmanabenefitsModal p strong {
            color: #0000ff;
        }

        /* Th */
        /* #upmanabenefitsModal tr th {
            color: #0000ff;
        } */

        /* What upmana label */
        .modal .modal-header h5 {
            color: #0000ff;
            font-weight: 700;
        }
    </style>
    <div class="p-3 border rounded border-dark bg-light">
        <p class="text-center">FAQ</p>
        <ul class="ps-3" style="list-style: none;">

            <li><a class="text-primary" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#whatIsUpmanaModal"><span class="text-primary pe-1">●</span>Comparison A.I.</a></li>
            <li><a class="text-primary" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#aiVsAgiModal"><span class="text-primary pe-1">●</span>Prompt </a></li>
            <li><a class="text-primary" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#upmanabenefitsModal"><span class="text-primary pe-1">●</span>Comparison A.I & Artificial General Intelligence (AGI) </a></li>
        </ul>
    </div>

    <div class="p-3 border rounded border-dark bg-light">
        <ul class="ps-3" style="list-style: none;">
            <li><a class="text-gray" target="_blank" href="https://g2c.prarang.in/ai/world"><span class="text-primary pe-1">●</span>World AI Report</a></li>
            <li><a class="text-gray" target="_blank" href="https://g2c.prarang.in/ai/india"><span class="text-primary pe-1">●</span>India AI Report</a></li>
            <li><a class="text-gray" target="_blank" href="https://g2c.prarang.in/world/development-planner"><span class="text-primary pe-1">●</span>World Development Planner</a></li>
            <li><a class="text-gray" target="_blank" href="https://g2c.prarang.in/world/market-planner"><span class="text-primary pe-1">●</span>World Market Planner</a></li>
            <li><a class="text-gray" target="_blank" href="https://g2c.prarang.in/india/development-planners"><span class="text-primary pe-1">●</span>India Development Planner</a></li>
            <li><a class="text-gray" target="_blank" href="https://g2c.prarang.in/india/market-planner/states"><span class="text-primary pe-1">●</span>India Market Planner</a></li>
            <li><a class="text-gray" target="_blank" href="https://www.prarang.in/semiotics"><span class="text-primary pe-1">●</span>India City Sentiment Analytics</a></li>
        </ul>
    </div>


</div>