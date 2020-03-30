<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Laravel');
        });
    }

    public function testFeedbackExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/feedback')
                ->assertSee('Написать отзыв')
                ->assertSeeLink('Написать отзыв');
        });
    }

    public function testFeedbackCreateExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/feedback/create')
                ->assertButtonEnabled('SEND')
                ->assertSee('YOU NAME')
                ->assertSee('E-MAIL')
                ->assertSee('PHONE')
                ->assertSee('THEME')
                ->assertSee('MESSAGE')
                ->type('PHONE', 'fgj')
                ->assertSee('Количество символов в поле Имя должно быть не менее 5')
                ->assertSee('Поле E-Mail адрес обязательно для заполнения.')
                ->assertSee('Поле Телефон обязательно для заполнения.')
                ->assertSee('Поле theme обязательно для заполнения.')
                ->assertSee('Поле message обязательно для заполнения.');
        });
    }
}
