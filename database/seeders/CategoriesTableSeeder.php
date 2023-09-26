<?php
namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Permission;
use TCG\Voyager\Models\Role;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        //Data Type
        $dataType = $this->dataType('name', 'categories');
        if (!$dataType->exists) {
            $dataType->fill([
                'slug'                  => 'categories',
                'display_name_singular' => __('seeders.data_types.category.singular'),
                'display_name_plural'   => __('seeders.data_types.category.plural'),
                'icon'                  => 'voyager-categories',
                'model_name'            => 'App\\Models\\Category',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();

            $this->translate($dataType, [
                'display_name_singular' => __('seeders.data_types.category.singular', [], 'en'),
                'display_name_plural'   => __('seeders.data_types.category.plural', [], 'en'),
            ], 'en');
        }

        //Data Rows
        $categoryDataType = DataType::where('slug', 'categories')->firstOrFail();
        $dataRow = $this->dataRow($categoryDataType, 'id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => __('seeders.data_rows.id'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 1,
            ])->save();
        }

        $dataRow = $this->dataRow($categoryDataType, 'order');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('seeders.data_rows.order'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'default' => 1,
                ],
                'order' => 3,
            ])->save();

            $this->translate($dataRow, [
                'display_name' => __('seeders.data_rows.order', [], 'en'),
            ], 'en');
        }

        $dataRow = $this->dataRow($categoryDataType, 'title');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('seeders.data_rows.title'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 4,
            ])->save();

            $this->translate($dataRow, [
                'display_name' => __('seeders.data_rows.title', [], 'en'),
            ], 'en');

        }

        $dataRow = $this->dataRow($categoryDataType, 'slug');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('seeders.data_rows.slug'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => [
                    'slugify' => [
                        'origin' => 'title',
                    ],
                ],
                'order' => 5,
            ])->save();

            $this->translate($dataRow, [
                'display_name' => __('seeders.data_rows.slug', [], 'en'),
            ], 'en');
        }

        $dataRow = $this->dataRow($categoryDataType, 'created_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('seeders.data_rows.created_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 6,
            ])->save();

            $this->translate($dataRow, [
                'display_name' => __('seeders.data_rows.created_at', [], 'en'),
            ], 'en');
        }

        $dataRow = $this->dataRow($categoryDataType, 'updated_at');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'timestamp',
                'display_name' => __('seeders.data_rows.updated_at'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'order'        => 7,
            ])->save();

            $this->translate($dataRow, [
                'display_name' => __('seeders.data_rows.updated_at', [], 'en'),
            ], 'en');
        }

        //Menu Item
        $menu = Menu::where('name', 'admin')->firstOrFail();
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('seeders.menu_items.categories'),
            'url'     => '',
            'route'   => 'voyager.categories.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-categories',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 2,
            ])->save();

            $this->translate($menuItem, [
                'title' => __('seeders.menu_items.categories', [], 'en'),
            ], 'en');

        }

        //Permissions
        Permission::generateFor('categories');

        $role = Role::where('name', 'admin')->firstOrFail();
        $permissions = Permission::where('table_name', 'categories');

        $role->permissions()->syncWithoutDetaching(
            $permissions->pluck('id')->all()
        );

        //Content
        $category = Category::firstOrNew([
            'slug' => 'capsules',
        ]);
        if (!$category->exists) {
            $category->fill([
                'title' => __('seeders.data.categories.capsules.title'),
                'slug' => 'capsules',
            ])->save();

            $this->translate($category, [
                'title' => __('seeders.data.categories.capsules.title', [], 'en'),
            ], 'en');
        }

        $category = Category::firstOrNew([
            'slug' => 'rooms',
        ]);
        if (!$category->exists) {
            $category->fill([
                'title' => __('seeders.data.categories.rooms.title'),
                'slug' => 'rooms',
            ])->save();

            $this->translate($category, [
                'title' => __('seeders.data.categories.rooms.title', [], 'en'),
            ], 'en');
        }
    }

    /**
     * [dataRow description].
     *
     * @param [type] $type  [description]
     * @param [type] $field [description]
     *
     * @return [type] [description]
     */
    protected function dataRow($type, $field)
    {
        return DataRow::firstOrNew([
            'data_type_id' => $type->id,
            'field'        => $field,
        ]);
    }

    /**
     * [dataType description].
     *
     * @param [type] $field [description]
     * @param [type] $for   [description]
     *
     * @return [type] [description]
     */
    protected function dataType($field, $for)
    {
        return DataType::firstOrNew([$field => $for]);
    }

    protected function translate($model, $fields, $locale) {
        $model = $model->translate($locale);

        foreach ($fields as $field => $value) {
            $model->{$field} = $value;
        }

        $model->save();
    }
}
