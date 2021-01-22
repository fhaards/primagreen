<?php echo validation_errors(); ?>
<?php echo form_open('profile/edit-address/edit-form'); ?>
<div class="grid grid-cols-1 md:grid-cols-3 gap-10">
    <div class="flex flex-col">
        <div class="mb-2">
            <label>
                <p class="text-gray-600 font-semibold text-sm">Street/ Address</p>
                <textarea name="street" placeholder="Jl. Jendral Soedirman No. 4 A" class="block w-full mt-1 text-sm focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white form-input"></textarea>
            </label>
        </div>
        <div class="mb-2">
            <label id="thisCity">
                <p class="text-gray-600 font-semibold text-sm">Province </p>
                <input type="hidden" value="0" id="inputProvinceName" name="province_name" />
                <select id="getProvince" name="idProvince" class="getProvince block w-full mt-1 text-sm focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white form-select">
                </select>
            </label>
        </div>
        <div class="mb-2">
            <label id="getCityHide" class="hidden">
                <p class="text-gray-600 font-semibold text-sm">City / Region</p>
                <input type="hidden" value="0" id="inputCityName" name="city_name" />
                <select id="getCity" name="IdCity" class="block w-full mt-1 text-sm focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white form-select">
                </select>
            </label>
        </div>
        <div class="mb-2">
            <label class="hidden" id="getSubDistrictsHide">
                <p class="text-gray-600 font-semibold text-sm">Sub Districts</p>
                <input type="hidden" value="0" id="inputSubDistrictsName" name="subdistricts_name" />
                <select id="getSubDistricts" name="idSubDistricts" class="block w-full mt-1 text-sm focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white form-select">
                </select>
            </label>
        </div>
        <div class="mb-2">
            <label>
                <p class="text-gray-600 font-semibold text-sm">Zip Code </p>
                <input type="text" name="zip_code" value="<?= getUserData()['zip_code'];?>" class="block w-full mt-1 text-sm focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white form-input">
            </label>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 border-t-2 border-gray-300 py-4 my-4">
    <div id="submitEditAddress" class="w-full text-center mx-auto hidden">
        <button type="submit" class="flex space-x-2 items-center shadow-lg px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-gray-800 rounded-md active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
            <svg class="w-4 h-4" fill="" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
            </svg>
            <span class="hidden lg:block">Save</span>
        </button>
    </div>
</div>
<?php echo form_close(); ?>