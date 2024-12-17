<div class="space-y-1">
    <label for="<?= $id ?>" class="block text-sm font-medium text-gray-700">
        <?= $label ?>
        <?php if (isset($required) && $required): ?>
            <span class="text-red-500">*</span>
        <?php endif; ?>
    </label>
    
    <input type="<?= $type ?? 'text' ?>" 
           id="<?= $id ?>" 
           name="<?= $name ?>" 
           value="<?= old($name, $value ?? '') ?>"
           <?= isset($required) && $required ? 'required' : '' ?>
           <?= isset($placeholder) ? 'placeholder="' . $placeholder . '"' : '' ?>
           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm
                  <?= isset($error) ? 'border-red-300' : '' ?>">
    
    <?php if (isset($error)): ?>
        <p class="mt-1 text-sm text-red-600"><?= $error ?></p>
    <?php endif; ?>
    
    <?php if (isset($help)): ?>
        <p class="mt-1 text-sm text-gray-500"><?= $help ?></p>
    <?php endif; ?>
</div>