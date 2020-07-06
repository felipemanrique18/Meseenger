@extends('layouts.app')

@section('content')
<b-container>
    <b-row align-h="center">
        <b-col class="col-lg-4 col-md-8 col-sm-12">
            <b-card
              title="Registro"
            >

            <b-form method="POST" action="{{ route('register') }}">
                        @csrf
                        <b-form-group
                            label="Nombre:"
                            label-for="name"
                          >
                            <b-form-input
                              id="name"
                              name="name"
                              type="text"
                              value="{{ old('name') }}"autofocus
                              required
                            ></b-form-input>
                            @error('name')
                                {{-- <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> --}}
                                {{ $message }}
                            @enderror
                        </b-form-group>
                        <b-form-group
                            label="Correo Electronico:"
                            label-for="email"
                          >
                            <b-form-input
                              id="email"
                              name="email"
                              type="email"
                              value="{{ old('email') }}"
                              required
                              placeholder="Example@example.com"
                            ></b-form-input>
                            @error('email')
                                {{-- <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> --}}
                                {{ $message }}
                            @enderror
                        </b-form-group>
                        <b-form-group
                            label="Contraseña"
                            label-for="password"
                          >
                            <b-form-input
                              id="password"
                              name="password"
                              type="password"
                              required
                            ></b-form-input>
                            @error('password')
                                    {{-- <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> --}}
                                    {{ $message }}
                                @enderror
                        </b-form-group>
                        <b-form-group
                            label="Confirma tu Contraseña"
                            label-for="password-confirm"
                          >
                            <b-form-input
                              id="password-confirm"
                              name="password_confirmation"
                              type="password"
                              required
                            ></b-form-input>
                        </b-form-group>
                        <b-button type="submit" variant="primary">Ingresar</b-button>

                        <b-button href="{{ route('login') }}" variant="link">¿Ya estas registrado?</b-button>
                </b-form>

            </b-card>
            
        </b-col>
    </b-row>
</b-container> 
@endsection
