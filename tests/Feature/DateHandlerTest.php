<?php

namespace Tests\Feature;

use Tests\TestCase;

class DateHandlerTest extends TestCase
{
    public function test_the_application_handles_muggle_date_formats(): void
    {
        $dateFormats = [
            '2025-02-23', // Y-m-d
            '23-02-2025', // d-m-Y
            '23/02/25',   // d/m/y
            '23/02/2025', // d/m/Y
            '23-02-25',   // d-m-y
        ];

        foreach ($dateFormats as $date) {
            $this->get("/fix_my_date_handling?date=$date")
                ->assertOk()
                ->assertContent('2025-02-23');
        }
    }
}

