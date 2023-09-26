<?php
namespace Database\Seeders;

use App\Models\Category;
use App\Models\Feature;
use App\Models\RoomType;
use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Permission;
use TCG\Voyager\Models\Role;

class RoomTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        //Data Type
        $dataType = $this->dataType('name', 'rooms');
        if (!$dataType->exists) {
            $dataType->fill([
                'slug'                  => 'rooms',
                'display_name_singular' => __('seeders.data_types.room.singular'),
                'display_name_plural'   => __('seeders.data_types.room.plural'),
                'icon'                  => 'voyager-tv',
                'model_name'            => 'App\\Models\\Room',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();

            $this->translate($dataType, [
                'display_name_singular' => __('seeders.data_types.room.singular', [], 'en'),
                'display_name_plural'   => __('seeders.data_types.room.plural', [], 'en'),
            ], 'en');
        }

        //Data Rows
        $dataType = DataType::where('slug', 'rooms')->firstOrFail();
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

        $dataRow = $this->dataRow($dataType, 'fd24_id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text',
                'display_name' => __('seeders.data_rows.fd24_id'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 2,
            ])->save();

            $this->translate($dataRow, [
                'display_name' => __('seeders.data_rows.fd24_id', [], 'en'),
            ], 'en');

        }

        $dataRow = $this->dataRow($dataType, 'order');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => __('seeders.data_rows.order'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 3,
            ])->save();

            $this->translate($dataRow, [
                'display_name' => __('seeders.data_rows.order', [], 'en'),
            ], 'en');

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
                'display_name' => __('seeders.data_rows.title'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 5,
            ])->save();

            $this->translate($dataRow, [
                'display_name' => __('seeders.data_rows.title', [], 'en'),
            ], 'en');

        }

        $dataRow = $this->dataRow($dataType, 'description');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'text_area',
                'display_name' => __('seeders.data_rows.description'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 6,
            ])->save();

            $this->translate($dataRow, [
                'display_name' => __('seeders.data_rows.description', [], 'en'),
            ], 'en');

        }

        $dataRow = $this->dataRow($dataType, 'pictures');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'multiple_images',
                'display_name' => __('seeders.data_rows.pictures'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 7,
            ])->save();

            $this->translate($dataRow, [
                'display_name' => __('seeders.data_rows.pictures', [], 'en'),
            ], 'en');

        }

        $dataRow = $this->dataRow($dataType, 'category_id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => __('seeders.data_rows.category_id'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 0,
                'order'        => 8,
            ])->save();

            $this->translate($dataRow, [
                'display_name' => __('seeders.data_rows.category_id', [], 'en'),
            ], 'en');

        }

        $dataRow = $this->dataRow($dataType, 'room_type_id');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'number',
                'display_name' => __('seeders.data_rows.room_type_id'),
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 10,
            ])->save();

            $this->translate($dataRow, [
                'display_name' => __('seeders.data_rows.room_type_id', [], 'en'),
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
                'order'        => 11,
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
                'order'        => 12,
            ])->save();

            $this->translate($dataRow, [
                'display_name' => __('seeders.data_rows.updated_at', [], 'en'),
            ], 'en');
        }

        $dataRow = $this->dataRow($dataType, 'room_belongsto_category_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => __('seeders.data_rows.category'),
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 1,
                'details'      => [
                    "model"         => Category::class,
                    "table"         => "categories",
                    "type"          => "belongsTo",
                    "column"        => "category_id",
                    "key"           => "id",
                    "label"         => "title",
                    "pivot_table"   => "categories",
                    "pivot"         => 0,
                    "taggable"      => null
                    ],
            ])->save();

            $this->translate($dataRow, [
                'display_name' => __('seeders.data_rows.category', [], 'en'),
            ], 'en');
        }

        $dataRow = $this->dataRow($dataType, 'room_belongstomany_feature_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => __('seeders.data_rows.features'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 13,
                'details'      => [
                    "model"         => Feature::class,
                    "table"         => "features",
                    "type"          => "belongsToMany",
                    "column"        => "id",
                    "key"           => "id",
                    "label"         => "title",
                    "pivot_table"   => "feature_room",
                    "pivot"         => 1,
                    "taggable"      => null
                    ],
            ])->save();

            $this->translate($dataRow, [
                'display_name' => __('seeders.data_rows.features', [], 'en'),
            ], 'en');
        }

        $dataRow = $this->dataRow($dataType, 'room_belongsto_room_type_relationship');
        if (!$dataRow->exists) {
            $dataRow->fill([
                'type'         => 'relationship',
                'display_name' => __('seeders.data_rows.type'),
                'required'     => 0,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'order'        => 1,
                'details'      => [
                    "model"         => RoomType::class,
                    "table"         => "room_types",
                    "type"          => "belongsTo",
                    "column"        => "room_type_id",
                    "key"           => "id",
                    "label"         => "title",
                    "pivot_table"   => "room_types",
                    "pivot"         => 0,
                    "taggable"      => null
                ],
            ])->save();

            $this->translate($dataRow, [
                'display_name' => __('seeders.data_rows.type', [], 'en'),
            ], 'en');
        }




        //Permissions
        Permission::generateFor('rooms');

        $role = Role::where('name', 'admin')->firstOrFail();
        $permissions = Permission::where('table_name', 'rooms');

        $role->permissions()->syncWithoutDetaching(
            $permissions->pluck('id')->all()
        );

        //Menu Item
        $menu = Menu::where('name', 'admin')->firstOrFail();
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('seeders.menu_items.rooms'),
            'url'     => '',
            'route'   => 'voyager.rooms.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-tv',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 3,
            ])->save();

            $this->translate($menuItem, [
                'title' => __('seeders.menu_items.rooms', [], 'en'),
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
