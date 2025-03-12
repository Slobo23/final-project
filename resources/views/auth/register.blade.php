<x-layout>

    <div class="p-4 w-full mx-auto">

        <x-page-heading>Register</x-page-heading>

        <x-forms.form method="POST" action="/register" enctype="multipart/form-data">

            <x-forms.input label="name" name="name" />


            <x-forms.input label="e-mail" type="email" name="email" />

            <x-forms.input label="Telephone number" name="phone" />


            <x-forms.input label="password" type="password" name="password" />
            <x-forms.input label="Confirm password" type="password" name="password_confirmation" />

            <x-forms.divider />

            <x-forms.button>Create Account</x-forms.button>
        </x-forms.form>

    </div>
</x-layout>
