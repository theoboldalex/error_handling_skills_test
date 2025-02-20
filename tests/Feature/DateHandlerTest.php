<?php

namespace Tests\Feature;

use Tests\TestCase;

class DateHandlerTest extends TestCase
{
    /**
    * The Product Owner burst into the sprint planning, eyes gleaming with unchecked enthusiasm.
    * "I have a game-changing idea," they announced, ignoring the wary glances from the dev team. "We should let users choose to display dates in D/M/Y format!"
    *
    * Silence. A backend engineer visibly twitched. The frontend lead let out a slow exhale.
    * "But… our entire system is built around ISO 8601. Our database stores everything in YYYY-MM-DD. Our API responses—"
    * "Details!" the PO waved a dismissive hand. "Users will love the flexibility!"
    *
    * The devs exchanged glances, knowing full well where this was heading.
    * Another sprint of untangling timestamp nightmares. Another round of heated Slack debates on moment.js vs. date-fns. Another bug report about February 31st.
    *
    * The PO beamed, blissfully unaware. "This will be easy, right?"
    * The team sighed in unison.
    */
    public function test_the_application_handles_muggle_date_formats(): void
    {
        $dateFormats = [
            '2025-02-23', // Y-m-d
            '23-02-2025', // d-m-Y
            '23/02/25',   // d/m/y
            '23/02/2025', // d/m/Y
        ];

        foreach ($dateFormats as $date) {
            $this->get("/fix_my_date_handling?date=$date")
                ->assertOk()
                ->assertContent('2025-02-23');
        }
    }
}

