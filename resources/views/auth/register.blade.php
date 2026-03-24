<x-guest-layout>
<form method="POST" action="{{ route('register') }}">
@csrf

<div>
    <div>
        <x-input-label value="Nome" />
        <x-text-input class="block mt-1 w-full" name="name" x-model="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label value="Email" />
        <x-text-input type="email" class="block mt-1 w-full" name="email" x-model="email" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label value="Senha" />
        <x-text-input type="password" class="block mt-1 w-full" name="password" x-model="password" />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <div class="mt-4">
        <x-input-label value="Confirmar Senha" />
        <x-text-input type="password" class="block mt-1 w-full" name="password_confirmation" x-model="password_confirmation" />
    </div>

    <div class="mt-4 flex justify-between">
        <x-primary-button type="submit" @click="submitForm()">Registrar</x-primary-button>
    </div>
</div>

</form>
</x-guest-layout>