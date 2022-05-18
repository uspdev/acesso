<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;


class PredioTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = User::factory() ->create();
        $user->setDefaultPermission();

        $user->givePermissionTo(['admin']);

        $this->browse(function (Browser $browser) use ($user){
            
            $browser->loginAs($user)
                    ->visit('/predios')
                    ->assertSee('Prédios')
                    ->press('Editar')
                    ->assertPathIs('/predios/2/edit')
                    ->typeSlowly('nome', 'STIIISTIII')
                    ->press('Enviar')
                    ->assertSee('STIIISTIII');
        });
    }
}
