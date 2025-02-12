<div>
    <div class="text-center">
       <div>
           <a href="javascript:void(0)" class="logo"><img src="{{ asset('assets/images/sigodam.png') }}" height="150" alt="logo"></a>
       </div>

        <h4 class="font-size-18 mt-0 mb-0">Selamat Datang</h4>
        <p class="text-muted">Silahkan login ke aplikasi SIGODAM</p>
    </div>

    <div class="p-2 mt-2">
        @if (session()->has('message'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="mdi mdi-block-helper mr-2"></i>
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif



        <form class="form-horizontal" wire:submit="login">

            <div class="form-group auth-form-group-custom">
                <i class="ri-user-2-line auti-custom-input-icon"></i>
                <label for="username">ID Pengguna</label>
                <input autofocus type="text" class="form-control @error('valid.username') is-invalid @enderror" wire:model="valid.username" placeholder="Ketik ID login anda..">
                @error('valid.username') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="form-group auth-form-group-custom" x-data="{ show_pass : false }">

                <i style="cursor: pointer;" :class="show_pass? 'ri-eye-fill auti-custom-input-icon' : 'ri-eye-close-fill auti-custom-input-icon'" @click="show_pass = show_pass ? false : true"></i>
                <label for="userpassword">Kata Sandi</label>
                <input :type="show_pass? 'text':'password'" class="form-control @error('valid.password') is-invalid @enderror" wire:model="valid.password" placeholder="Ketik kata sandi anda..">
                @error('valid.password') <div class="invalid-feedback">{{ $message }}</div> @enderror

            </div>

            <div class="form-group auth-form-group-custom">
                <i class="ri-shield-user-line auti-custom-input-icon"></i>
                <label for="userpassword">Login Sebagai</label>
                <select wire:model="valid.role_id" class="form-control @error('valid.role_id') is-invalid @enderror">
                    <option value="">Pilih anda login sebagai apa..</option>
                    @foreach ($roles as $item)
                        <option value="{{$item['id']}}">{{$item['name']}}</option>
                    @endforeach
                </select>
                @error('valid.role_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>


            <div class="mt-4 text-center">
                <button class="btn btn-primary w-md waves-effect waves-light btn-block" type="submit">Masuk</button>
            </div>

            {{-- <div class="mt-3 text-center">
                <a href="{{ route('auth.forgot') }}" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Lupa kata sandi?</a>
            </div> --}}
        </form>
    </div>

    <div class="mt-3 text-center">
{{--        <p>Anda mitra dan belum memiliki akun ? <a href="{{ route('auth.register') }}" class="font-weight-medium text-primary"> Daftar </a> </p>--}}
        <p>© 2023 SIGODAM. Hak Cipta oleh Tim Developer</p>

    </div>
</div>
