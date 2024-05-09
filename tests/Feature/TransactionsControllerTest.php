<?php

use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class TransactionsControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();


        $user = User::factory()->create();

        $this->actingAs($user);
    }

    public function test_transaction_index(): void
    {
        $response = $this->get('/transactions');


        $response->assertStatus(200) //estado 200 generalmente indica que la página solicitada fue encontrada y cargada con éxito.
            ->assertSee('Account Transactions')
            ->assertSee('Create A New Transaction');
    }


    public function test_create_transaction(): void
    {
        // Datos que se enviarán en la solicitud POST
        $account = Account::factory()->create();
        $data = Transaction::factory()->for($account)->create()->toArray();


        $response = $this->post('/transactions', $data);


        $response->assertStatus(302) // Verificar que la respuesta tiene un estatus 302 que es de una redireccion con exito
            ->assertRedirect('/transactions');
    }

    public function test_bad_create_transaction(): void
    {
        // Datos que se enviarán en la solicitud POST
        $account = Account::factory()->create();
        $data = Transaction::factory()->for($account)->make()->toArray();
        // Modificar los datos para que sean inválidos
        $data['amount'] = -100; // Monto de transacción negativophp 



        $response = $this->post('/transactions', $data);

        
        $response->assertStatus(302)
            ->assertSessionHasErrors('amount');
    }


    
    public function test_delete_transaction(): void
    {
        // Datos que se enviarán en la solicitud POST
        $account = Account::factory()->create();
        $data = Transaction::factory()->for($account)->create()->toArray();
        
        

        $response = $this->delete('/transactions/'. $data['id']);

        $response->assertStatus(302)
            ->assertRedirect('/transactions'); 
    }
}
