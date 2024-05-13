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

        $this->user = User::factory()->create();

        $this->actingAs($this->user);
    }

    public function test_transaction_index(): void
    {
        $response = $this->get(route('transactions.index'));


        $response->assertStatus(200) //estado 200 generalmente indica que la página solicitada fue encontrada y cargada con éxito.
            ->assertSee('Account Transactions')
            ->assertSee('Create A New Transaction');
    }


    public function test_create_transaction(): void
    {
        // Datos que se enviarán en la solicitud POST
        $account = Account::factory()->create(['user_id' => $this->user->id]);
        $data = Transaction::factory()->for($account)->create()->toArray();


        $response = $this->post(route('transactions.store', $data));

        $this->assertDatabaseHas('transactions', $data);
        $response->assertStatus(302) // Verificar que la respuesta tiene un estatus 302 que es de una redireccion con exito
            ->assertRedirect(route('transactions.index'));
    }

    public function test_bad_create_transaction(): void
    {
        // Datos que se enviarán en la solicitud POST
        $account = Account::factory()->create(['user_id' => $this->user->id]);
        $data = Transaction::factory()->for($account)->make()->toArray();
        // Modificar los datos para que sean inválidos
        $data['amount'] = -100; // Monto de transacción negativo


        $response = $this->post(route('transactions.store', $data));


        $response->assertStatus(302)
            ->assertSessionHasErrors('amount');
    }



    public function test_delete_transaction(): void
    {
        // Datos que se enviarán en la solicitud POST
        $account = Account::factory()->create(['user_id' => $this->user->id]);
        $data = Transaction::factory()->for($account)->create()->toArray();

        $response = $this->delete(route('transactions.destroy', $data['id']));


        $this->assertSoftDeleted('transactions', $data);

        $response->assertStatus(302)
            ->assertRedirect(route('transactions.index'));
    }
}
