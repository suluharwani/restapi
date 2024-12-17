<?= $this->extend('layout/admin') ?>

<?= $this->section('title') ?>Sliders<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?= view_cell('App\Views\Components\DataTable::render', [
    'id' => 'sliders-table',
    'title' => $title,
    'createUrl' => $createUrl,
    'columns' => $columns,
    'data' => $data,
    'config' => $config
]) ?>
<?= $this->endSection() ?>