<div class="space-y-1">
    <label for="<?= $id ?>" class="block text-sm font-medium text-gray-700">
        <?= $label ?>
        <?php if (isset($required) && $required): ?>
            <span class="text-red-500">*</span>
        <?php endif; ?>
    </label>
    
    <select id="<?= $id ?>" 
            name="<?= $name ?>" 
            <?= isset($required) && $required ? 'required' : '' ?>
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm
                   <?= isset($error) ? 'border-red-300' : '' ?>">
        <?php if (isset($placeholder)): ?>
            <option value=""><?= $placeholder ?></option>
        <?php endif; ?>
        
        <?php foreach ($options as $optionValue => $optionLabel): ?>
            <option value="<?= $optionValue ?>" <?= old($name, $value ?? '') == $optionValue ? 'selected' : '' ?>>
                <?= $optionLabel ?>
            </option>
        <?php endforeach; ?>
    </select>
    
    <?php if (isset($error)): ?>
        <p class="mt-1 text-sm text-red-600"><?= $error ?></p>
    <?php endif; ?>
    
    <?php if (isset($help)): ?>
        <p class="mt-1 text-sm text-gray-500"><?= $help ?></p>
    <?php endif; ?>
</div>