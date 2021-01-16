<div class="flex md:flex-row-reverse w-full py-5 px-4 mb-5 bg-white rounded-lg relative shadow-xs">
    <div class="flex flex-col space-y-2 w-full md:space-y-0 md:space-x-5 md:w-auto md:flex-row">
        <label>
            <button @click="openModalAddFaq" class="add_faq_modal flex space-x-2 items-center shadow-lg px-4 py-2 text-sm font-bold leading-5 text-white transition-colors duration-150 bg-gray-800 rounded-md active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray">
                <svg class="w-4 h-4" fill="" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                </svg>
                <span class="">New Question</span>
            </button>
        </label>
    </div>
</div>
<div class="w-full bg-white overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
        <table id="primaTable" class="table w-full whitespace-no-wrap stripe hover" width="100%">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Question</th>
                    <th class="px-4 py-3">Answer</th>
                    <th class="px-4 py-3">Date Add</th>
                    <th class="px-4 py-3"></th>
                </tr>
            </thead>
            <tbody id="faq-list-tbody" class="bg-white divide-y">
                <?php foreach ($faqList as $row) : ?>
                    <?php
                    $faqQuestion = $row['question'];
                    $faqAnswer = $row['answer'];
                        // if ((strlen($faqQuestion) > 50) && (strlen($faqAnswer) > 30)) :
                        //     $question = substr($faqQuestion, 0, 47) . '...';
                        //     $answer = substr($faqAnswer, 0, 47) . '...';
                        // else :
                        //     $question = $faqQuestion;
                        //     $answer = $faqAnswer;
                        // endif;
                    ?>
                    <tr>
                        <td><?= substr($faqQuestion, 0, 47); ?></td>
                        <td><?= substr($faqAnswer, 0, 47); ?></td>
                        <td>
                            <span class="hidden"> <?= strftime("%d-%M-%Y-%H:%M", strtotime($row['date_add'])); ?></span>
                            <?= strftime("%d-%M-%Y / %H:%M", strtotime($row['date_add'])); ?>
                        </td>
                        <td>
                            <div class="flex flex-row mx-auto space-x-2">
                                <button @click="openModalEditFaq" data-faq-id="<?= $row['id_faq']; ?>" data-faq-question="<?= $faqQuestion; ?>" data-faq-answer="<?= $faqAnswer ?>" class="editFaq flex items-center justify-between px-1 py-1 text-sm font-medium leading-5 rounded-md shadow-xs text-white transition-colors duration-150 bg-gray-800 active:bg-gray-900 hover:shadow-none hover:bg-gray-900 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                    <svg class="w-4 h-4 fill-current text-white" aria-hidden="true" fill="" viewBox="0 0 20 20">
                                        <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                    </svg>
                                </button>
                                <button  data-faq-delete-id="<?= $row['id_faq']; ?>"  class="deleteFaq flex items-center justify-between px-1 py-1 text-sm font-medium leading-5 rounded-md shadow-xs text-white transition-colors duration-150 bg-red-600  active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red" aria-label="Edit">
                                    <svg class="w-4 h-4" fill="currentColor" aria-hidden="true" viewBox="0 0 20 20">
                                        <path d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>