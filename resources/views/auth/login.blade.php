@extends('layouts.app')

@section('content')
<b-container>
    <b-row align-h="center">
        <b-col cols="5">
            <b-card
              title="Inico de session"
            >
                
                <b-form method="POST" action="{{ route('login') }}">
                        @csrf
                        <b-form-group
                            label="Correo Electronico:"
                            label-for="email"
                          >
                            <b-form-input
                              id="email"
                              name="email"
                              type="email"
                              value="{{ old('email') }}"autofocus
                              required
                              placeholder="Example@example.com"
                            ></b-form-input>
                        </b-form-group>
                        <b-form-group
                            label="Contraseña"
                            label-for="password"
                          >
                            <b-form-input
                              id="password"
                              name="password"
                              type="password"
                              value="{{ old('password') }}"
                              required
                            ></b-form-input>
                        </b-form-group>
                        <b-form-group>
                            <b-form-checkbox
                              name="Remember"
                              {{ old('remember') ? 'checked="true"' : '' }}
                              
                            >
                              Recordar session
                            </b-form-checkbox>
                        </b-form-group>
                        <b-button type="submit" variant="primary">Ingresar</b-button>

                        <b-button href="{{ route('password.request') }}" variant="link">Olvidate tu contraseña</b-button>
                </b-form>
            </b-card>
            
        </b-col>
    </b-row>
</b-container>
@endsection
