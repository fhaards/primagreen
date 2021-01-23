<div class="flex flex-col" id="change_password">
    <div class="">
        <h2 class="font-semibold text-gray-500"> Change Password </h2>
    </div>

    <p> &nbsp;</p>
    <div class="changepw_click mb-2 p-2 bg-gray-100 rounded-sm shadow-sm items-center" style="cursor:pointer;">
        <input type="checkbox" name="check_change_password" class="checkedbox_changepw"> &nbsp; <span class="text-sm text-gray-600 font-semibold"> I want change password </span>
    </div>
    <div class="type_password hidden">
        <div class="mb-2">
            <label>
                <p class="text-gray-600 font-semibold text-sm">Old Password</p>
                <input type="password" name="old_password" class="block w-full mt-1 text-sm focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white form-input" />
            </label>
        </div>

        <div class="my-2 py-4">
            <hr />
        </div>

        <div class="mb-2">
            <label>
                <p class="text-gray-600 font-semibold text-sm">New Password</p>
                <input type="password" name="newpassword" class="block w-full mt-1 text-sm focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white form-input" />
            </label>
        </div>
        <div class="mb-2">
            <label>
                <p class="text-gray-600 font-semibold text-sm">Confirm New Password</p>
                <input type="password" name="newpassword_confirm" class="block w-full mt-1 text-sm focus:border-green-400 focus:outline-none focus:shadow-outline-green bg-gray-100 focus:bg-white form-input" />
            </label>
        </div>
    </div>
</div>