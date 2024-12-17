<?= $this->extend('layout/admin') ?>

<?= $this->section('title') ?>
<?= isset($slider) ? 'Edit Slider' : 'Create Slider' ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="max-w-2xl mx-auto">
    <div class="bg-white shadow rounded-lg">
        <div class="px-6 py-4 border-b">
            <h2 class="text-xl font-semibold">
                <?= isset($slider) ? 'Edit Slider' : 'Create Slider' ?>
            </h2>
        </div>
        
        <form action="<?= isset($slider) ? site_url('admin/sliders/update/' . $slider['id']) : site_url('admin/sliders/store') ?>" 
              method="POST" 
              enctype="multipart/form-data"
              class="p-6 space-y-6">
            <?= csrf_field() ?>
            
            <?= view_cell('App\Views\Components\Form\Input::render', [
                'label' => 'Title',
                'name' => 'title',
                'id' => 'title',
                'value' => $slider['title'] ?? '',
                'required' => true,
                'error' => session('errors.title')
            ]) ?>
            
            <?= view_cell('App\Views\Components\Form\Textarea::render', [
                'label' => 'Description',
                'name' => 'description',
                'id' => 'description',
                'value' => $slider['description'] ?? '',
                'rows' => 4,
                'error' => session('errors.description')
            ]) ?>
            
            <?= view_cell('App\Views\Components\Form\File::render', [
                'label' => 'Image',
                'name' => 'image',
                'id' => 'image',
                'required' => !isset($slider),
                'preview' => $slider['image'] ?? null,
                'path' => 'sliders',
                'error' => session('errors.image')
            ]) ?>
            
            <div class="flex justify-end space-x-3">
                <a href="<?= site_url('admin/sliders') ?>" 
                   class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Cancel
                </a>
                <button type="submit" 
                        class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <?= isset($slider) ? 'Update' : 'Create' ?>
                </button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>