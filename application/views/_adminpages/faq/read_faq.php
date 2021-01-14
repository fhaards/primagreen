<div class="flex md:flex-row-reverse w-full py-5 px-4 mb-5 bg-white rounded-lg relative shadow-xs">
    <div class="flex flex-col space-y-2 w-full md:space-y-0 md:space-x-5 md:w-auto md:flex-row">
        <label>
            <button @click="openModalAddFaq" class="add_faq_modal flex space-x-2 items-center shadow-lg px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-gray-800 rounded-md active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
                <svg class="w-4 h-4" fill="" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                <span class="">New Faq</span>
            </button>
        </label>
    </div>
</div>
<div class="w-full bg-white overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <table id="faqlist-table" class="table w-full whitespace-no-wrap stripe hover" width="100%">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Question</th>
                    <th class="px-4 py-3">Answer</th>
                    <th class="px-4 py-3">Date Add</th>
                </tr>
            </thead>
            <tbody id="faq-list-tbody" class="faq-list-tbody bg-white divide-y"></tbody>
        </table>
    </div>
</div>