<div class="space-y-1">
    <label for="<?= $id ?>" class="block text-sm font-medium text-gray-700">
        <?= $label ?>
        <?php if (isset($required) && $required): ?>
            <span class="text-red-500">*</span>
        <?php endif; ?>
    </label>
    
    <div class="mt-1 flex items-center">
        <?php if (isset($preview) && $preview): ?>
            <div class="relative">
                <img src="<?= base_url('uploads/' . $path . '/' . $preview) ?>" 
                     alt="Preview" 
                     class="h-16 w-16 object-cover rounded-lg">
            </div>
        <?php endif; ?>
        
        <label class="relative <?= isset($preview) ? 'ml-4' : '' ?>">
            <span class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 cursor-pointer">
                <?= isset($preview) ? 'Change' : 'Upload' ?> <?= $label ?>
            </span>
            <input type="file" 
                   id="<?= $id ?>" 
                   name="<?= $name ?>" 
                   accept="<?= $accept ?? 'image/*' ?>"
                   <?= isset($required) && $required && !isset($preview) ? 'required' : '' ?>
                   class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
        </label>
    </div>
    
    <?php if (isset($error)): ?>
        <p class="mt-1 text-sm text-red-600"><?= $error ?></p>
    <?php endif; ?>
    
    <?php if (isset($help)): ?>
        <p class="mt-1 text-sm text-gray-500"><?= $help ?></p>
    <?php endif; ?>
</div>