<?php
namespace Database\Seeders;

use App\Models\Category;
use App\Models\Feature;
use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Permission;
use TCG\Voyager\Models\Role;

class FeaturesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        //Data Type
        $dataType = $this->dataType('name', 'features');
        if (!$dataType->exists) {
            $dataType->fill([
                'slug'                  => 'features',
                'display_name_singular' => __('seeders.data_types.feature.singular'),
                'display_name_plural'   => __('seeders.data_types.feature.plural'),
                'icon'                  => 'voyager-plus',
                'model_name'            => 'App\\Models\\Feature',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();

            $this->translate($dataType, [
                'display_name_singular' => __('seeders.data_types.feature.singular', [], 'en'),
                'display_name_plural'   => __('seeders.data_types.feature.plural', [], 'en'),
            ], 'en');
        }

        //Data Rows
        $featureDataType = DataType::where('slug', 'features')->firstOrFail();
        $dataRow = $this->dataRow($featureDataType, 'id');
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

        $dataRow = $this->dataRow($featureDataType, 'order');
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

        $dataRow = $this->dataRow($featureDataType, 'title');
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

        $dataRow = $this->dataRow($featureDataType, 'slug');
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

        $dataRow = $this->dataRow($featureDataType, 'picture');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'image',
                'display_name' => __('seeders.data_rows.picture'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order' => 6,
            ])->save();

            $this->translate($dataRow, [
                'display_name' => __('seeders.data_rows.picture', [], 'en'),
            ], 'en');
        }


        $dataRow = $this->dataRow($featureDataType, 'created_at');
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
                'order'        => 7,
            ])->save();

            $this->translate($dataRow, [
                'display_name' => __('seeders.data_rows.created_at', [], 'en'),
            ], 'en');
        }

        $dataRow = $this->dataRow($featureDataType, 'updated_at');
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
                'order'        => 8,
            ])->save();

            $this->translate($dataRow, [
                'display_name' => __('seeders.data_rows.updated_at', [], 'en'),
            ], 'en');
        }

        //Menu Item
        $menu = Menu::where('name', 'admin')->firstOrFail();

        $dictionariesMenuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('seeders.menu_items.dictionaries'),
            'url'     => '',
        ]);
        if (!$dictionariesMenuItem->exists) {
            $dictionariesMenuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-logbook',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 4,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('seeders.menu_items.features'),
            'url'     => '',
            'route'   => 'voyager.features.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-plus',
                'color'      => null,
                'parent_id'  => $dictionariesMenuItem->id,
                'order'      => 1,
            ])->save();

            $this->translate($menuItem, [
                'title' => __('seeders.menu_items.features', [], 'en'),
            ], 'en');

        }

        //Permissions
        Permission::generateFor('features');

        $role = Role::where('name', 'admin')->firstOrFail();
        $permissions = Permission::where('table_name', 'features');

        $role->permissions()->syncWithoutDetaching(
            $permissions->pluck('id')->all()
        );

        //Content
        $feature = Feature::firstOrNew([
            'slug' => 'beverages',
        ]);
        if (!$feature->exists) {
            $feature->fill([
                'title' => __('seeders.data.features.beverages.title'),
                'picture' => 'features/beverages.png',
                'order' => 1,
                'slug' => 'beverages',
            ])->save();

            $this->translate($feature, [
                'title' => __('seeders.data.features.beverages.title', [], 'en'),
            ], 'en');
        }

        $feature = Feature::firstOrNew([
            'slug' => 'conditioner',
        ]);
        if (!$feature->exists) {
            $feature->fill([
                'title' => __('seeders.data.features.conditioner.title'),
                'picture' => 'features/conditioner.png',
                'order' => 2,
                'slug' => 'conditioner',
            ])->save();

            $this->translate($feature, [
                'title' => __('seeders.data.features.conditioner.title', [], 'en'),
            ], 'en');
        }

        $feature = Feature::firstOrNew([
            'slug' => 'refrigerator',
        ]);
        if (!$feature->exists) {
            $feature->fill([
                'title' => __('seeders.data.features.refrigerator.title'),
                'picture' => 'features/refrigerator.png',
                'order' => 3,
                'slug' => 'refrigerator',
            ])->save();

            $this->translate($feature, [
                'title' => __('seeders.data.features.refrigerator.title', [], 'en'),
            ], 'en');
        }

        $feature = Feature::firstOrNew([
            'slug' => 'wifi',
        ]);
        if (!$feature->exists) {
            $feature->fill([
                'title' => __('seeders.data.features.wifi.title'),
                'picture' => 'features/wifi.png',
                'order' => 1,
                'slug' => 'wifi',
            ])->save();

            $this->translate($feature, [
                'title' => __('seeders.data.features.wifi.title', [], 'en'),
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
