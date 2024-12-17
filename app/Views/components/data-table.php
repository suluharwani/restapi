<div class="bg-white shadow rounded-lg overflow-hidden">
    <div class="p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold"><?= $title ?></h2>
            <?php if (isset($createUrl)): ?>
                <a href="<?= $createUrl ?>" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Add New
                </a>
            <?php endif; ?>
        </div>

        <div class="overflow-x-auto">
            <table id="<?= $id ?>" class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <?php foreach ($columns as $column): ?>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <?= $column['title'] ?>
                            </th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php foreach ($data as $row): ?>
                        <tr>
                            <?php foreach ($columns as $column): ?>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <?php
                                    if (isset($column['formatter'])) {
                                        echo $column['formatter']($row[$column['data']], $row);
                                    } else {
                                        echo esc($row[$column['data']]);
                                    }
                                    ?>
                                </td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->section('scripts') ?>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#<?= $id ?>').DataTable(<?= json_encode($config) ?>);
});
</script>
<?= $this->endSection() ?>