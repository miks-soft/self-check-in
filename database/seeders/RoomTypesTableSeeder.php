<?php
namespace Database\Seeders;

use App\Models\Category;
use App\Models\RoomType;
use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Permission;
use TCG\Voyager\Models\Role;

class RoomTypesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        //Data Type
        $dataType = $this->dataType('name', 'room_types');
        if (!$dataType->exists) {
            $dataType->fill([
                'slug'                  => 'room_types',
                'display_name_singular' => __('seeders.data_types.room_type.singular'),
                'display_name_plural'   => __('seeders.data_types.room_type.plural'),
                'icon'                  => 'voyager-categories',
                'model_name'            => 'App\\Models\\RoomType',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();

            $this->translate($dataType, [
                'display_name_singular' => __('seeders.data_types.room_type.singular', [], 'en'),
                'display_name_plural'   => __('seeders.data_types.room_type.plural', [], 'en'),
            ], 'en');
        }

        //Data Rows
        $dataType = DataType::where('slug', 'room_types')->firstOrFail();
        $dataRow = $this->dataRow($dataType, 'id');
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

        $dataRow = $this->dataRow($dataType, 'slug');
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
                'order'        => 4,
            ])->save();

            $this->translate($dataRow, [
                'display_name' => __('seeders.data_rows.slug', [], 'en'),
            ], 'en');

        }

        $dataRow = $this->dataRow($dataType, 'title');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('voyager::seeders.data_rows.title'),
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

        $dataRow = $this->dataRow($dataType, 'created_at');
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

        $dataRow = $this->dataRow($dataType, 'updated_at');
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

        //Permissions
        Permission::generateFor('room_types');

        $role = Role::where('name', 'admin')->firstOrFail();
        $permissions = Permission::where('table_name', 'room_types');

        $role->permissions()->syncWithoutDetaching(
            $permissions->pluck('id')->all()
        );

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
            'title'   => __('seeders.menu_items.types'),
            'url'     => '',
            'route'   => 'voyager.room_types.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-trees',
                'color'      => null,
                'parent_id'  => $dictionariesMenuItem->id,
                'order'      => 2,
            ])->save();

            $this->translate($menuItem, [
                'title' => __('seeders.menu_items.types', [], 'en'),
            ], 'en');

        }

        //Content
        $roomType = RoomType::firstOrNew([
            'slug' => 'upper',
        ]);
        if (!$roomType->exists) {
            $roomType->fill([
                'title' => __('seeders.data.room_types.upper.title'),
                'slug' => 'upper',
            ])->save();

            $this->translate($roomType, [
                'title' => __('seeders.data.room_types.upper.title', [], 'en'),
            ], 'en');
        }

        $roomType = RoomType::firstOrNew([
            'slug' => 'lower',
        ]);
        if (!$roomType->exists) {
            $roomType->fill([
                'title' => __('seeders.data.room_types.lower.title'),
                'slug' => 'lower',
            ])->save();

            $this->translate($roomType, [
                'title' => __('seeders.data.room_types.lower.title', [], 'en'),
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
