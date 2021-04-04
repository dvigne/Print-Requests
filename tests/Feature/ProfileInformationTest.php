<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Jetstream\Http\Livewire\UpdateProfileInformationForm;
use Livewire\Livewire;
use Tests\TestCase;

class ProfileInformationTest extends TestCase
{
    use RefreshDatabase;

    public function test_current_profile_information_is_available()
    {
        $this->actingAs($user = User::factory()->create());

        $component = Livewire::test(UpdateProfileInformationForm::class);

        $this->assertEquals($user->first, $component->state['first']);
        $this->assertEquals($user->last, $component->state['last']);
        $this->assertEquals($user->email, $component->state['email']);
    }

    public function test_profile_information_can_be_updated()
    {
        $this->actingAs($user = User::factory()->create());

        Livewire::test(UpdateProfileInformationForm::class)
                ->set('state', ['first' => 'Test', 'last' => 'User', 'email' => 'test@example.com'])
                ->call('updateProfileInformation');

        $this->assertEquals('Test', $user->fresh()->first);
        $this->assertEquals('User', $user->fresh()->last);
        $this->assertEquals('test@example.com', $user->fresh()->email);
    }
}
