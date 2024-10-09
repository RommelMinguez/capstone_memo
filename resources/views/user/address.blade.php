<x-layout>

    <x-header></x-header>

    <div class="w-full bg-[#FEF6E4] flex justify-start">

        <x-nav-user></x-nav-user>

        <main class="pt-20 w-full md:w-5/6">
            <div class="w-full py-10">
                <div class="w-11/12 m-auto rounded-lg bg-white border shadow-md p-5">
                    <div id="open-create-form" class="border-2 border-red-400 border-dashed text-red-400 hover:border-red-500 hover:text-red-500 flex justify-center items-center font-semibold h-20 rounded-lg cursor-pointer">
                        + Add Address
                    </div>

                    <br><br><hr>

                    <div class="bg-red-500 bg-opacity-5">
                        <x-address-card :address="Auth::user()->mainAddress"></x-address-card>
                    </div>

                    @foreach ($addresses as $address)
                        @if ($address->id != Auth::user()->mainAddress->id)
                            <x-address-card :address="$address"></x-address-card>
                        @endif
                    @endforeach

                </div>
            </div>
        </main>
    </div>

    <x-address-create :regions="$regions"></x-address-create>

    @session('success')
        <x-response-success>{{ session('success') }}</x-response-success>
    @endsession
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <x-response-failed>{{ $error }}</x-response-failed>
        @endforeach
    @endif


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            setDefaultAddress();
        });


        //SHOW-HIDE CREATE FORM
        let create_form = document.getElementById('address-create-form');
        let close_form = document.getElementById('close-create-form');
        let open_form = document.getElementById('open-create-form');

        open_form.addEventListener('click', function() {
            create_form.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        });
        close_form.addEventListener('click', function() {
            create_form.classList.add('hidden');
            document.body.style.overflow = 'auto';
        });

        //ADDRESS API
        let region_select = document.getElementById('region');
        let province_select = document.getElementById('province');
        let cityMun_select = document.getElementById('city_municipality');
        let barangay_select = document.getElementById('barangay');

        region_select.addEventListener('change', function() {
            getProvince();
        });
        province_select.addEventListener('change', function() {
            getCityMun();
        });
        cityMun_select.addEventListener('change', function() {
            getBarangay();
        });

        async function getProvince() {
            province_select.innerHTML = '<option value="" disabled selected></option>';
            province_select.classList.add('bg-gray-100');
            cityMun_select.innerHTML = '<option value="" disabled selected></option>';
            // cityMun_select.disabled = true;
            cityMun_select.classList.add('bg-gray-100');
            barangay.innerHTML = '<option value="" disabled selected></option>';
            // barangay_select.disabled = true;
            barangay_select.classList.add('bg-gray-100');
            try {
                let regCode = region_select.options[region_select.selectedIndex].getAttribute('data-code');
                let response = await fetch('/user/address-api/province/' + regCode);
                let provinces = await response.json();

                provinces.forEach(prov => {
                    let option = document.createElement('option');
                    option.value = prov.provDesc;
                    option.text = prov.provDesc;
                    option.setAttribute('data-code', prov.provCode);
                    province_select.add(option);
                });
                // province_select.removeAttribute('disabled');
                province_select.classList.remove('bg-gray-100');
            } catch (error) {
                console.error('Error fetching provinces:', error);
            }
        }
        async function getCityMun() {
            cityMun_select.innerHTML = '<option value="" disabled selected></option>';
            barangay.innerHTML = '<option value="" disabled selected></option>';
            // barangay_select.disabled = true;
            barangay_select.classList.add('bg-gray-100');
            try {
                let provCode = province_select.options[province_select.selectedIndex].getAttribute('data-code');
                let response = await fetch('/user/address-api/cityMun/' + provCode);
                let cityMunicipality = await response.json();

                cityMunicipality.forEach(cityMun => {
                    let option = document.createElement('option');
                    option.value = cityMun.citymunDesc;
                    option.text = cityMun.citymunDesc;
                    option.setAttribute('data-code', cityMun.citymunCode);
                    cityMun_select.add(option);
                });
                // cityMun_select.removeAttribute('disabled');
                cityMun_select.classList.remove('bg-gray-100');
            } catch (error) {
                console.error('Error fetching provinces:', error);
            }
        }
        async function getBarangay() {
            barangay.innerHTML = '<option value="" disabled selected></option>';
            try {
                let citymunCode = cityMun_select.options[cityMun_select.selectedIndex].getAttribute('data-code');
                let response = await fetch('/user/address-api/barangay/' + citymunCode);
                let barangay = await response.json();

                barangay.forEach(brgy => {
                    let option = document.createElement('option');
                    option.value = brgy.brgyDesc;
                    option.text = brgy.brgyDesc;
                    barangay_select.add(option);
                });
                // barangay_select.removeAttribute('disabled');
                barangay_select.classList.remove('bg-gray-100');
            } catch (error) {
                console.error('Error fetching provinces:', error);
            }
        }
        async function setDefaultAddress() {
            try {
                let regCode = region_select.options[region_select.selectedIndex].getAttribute('data-code');
                let responseReg = await fetch('/user/address-api/province/' + regCode);
                let provinces = await responseReg.json();

                provinces.forEach(prov => {
                    let option = document.createElement('option');
                    option.value = prov.provDesc;
                    option.text = prov.provDesc;
                    option.setAttribute('data-code', prov.provCode);
                    option.selected = (prov.provCode == 1013);
                    province_select.add(option);
                });


                let provCode = province_select.options[province_select.selectedIndex].getAttribute('data-code');
                let responseCityMun = await fetch('/user/address-api/cityMun/' + provCode);
                let cityMunicipality = await responseCityMun.json();

                cityMunicipality.forEach(cityMun => {
                    let option = document.createElement('option');
                    option.value = cityMun.citymunDesc;
                    option.text = cityMun.citymunDesc;
                    option.setAttribute('data-code', cityMun.citymunCode);
                    option.selected = (cityMun.citymunCode == 101313)
                    cityMun_select.add(option);
                });


                let citymunCode = cityMun_select.options[cityMun_select.selectedIndex].getAttribute('data-code');
                let responseBrgy = await fetch('/user/address-api/barangay/' + citymunCode);
                let barangay = await responseBrgy.json();

                barangay.forEach(brgy => {
                    let option = document.createElement('option');
                    option.value = brgy.brgyDesc;
                    option.text = brgy.brgyDesc;
                    option.selected = (brgy.id == 31225);
                    barangay_select.add(option);
                });
            } catch (error) {
                console.error('Error fetching provinces:', error);
            }
        }
    </script>
</x-layout>
