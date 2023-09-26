<?php
namespace Database\Seeders;

use App\Models\Category;
use App\Models\Paysystem;
use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Permission;
use TCG\Voyager\Models\Role;

class PaysystemsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        //Data Type
        $dataType = $this->dataType('name', 'paysystems');
        if (!$dataType->exists) {
            $dataType->fill([
                'slug'                  => 'paysystems',
                'display_name_singular' => __('seeders.data_types.paysystem.singular'),
                'display_name_plural'   => __('seeders.data_types.paysystem.plural'),
                'icon'                  => 'voyager-credit-cards',
                'model_name'            => 'App\\Models\\Paysystem',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();

            $this->translate($dataType, [
                'display_name_singular' => __('seeders.data_types.paysystem.singular', [], 'en'),
                'display_name_plural'   => __('seeders.data_types.paysystem.plural', [], 'en'),
            ], 'en');
        }

        //Data Rows
        $paysystemDataType = DataType::where('slug', 'paysystems')->firstOrFail();
        $dataRow = $this->dataRow($paysystemDataType, 'id');
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

        $dataRow = $this->dataRow($paysystemDataType, 'order');
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
                'order' => 1,
            ])->save();

            $this->translate($dataRow, [
                'display_name' => __('seeders.data_rows.order', [], 'en'),
            ], 'en');
        }

        $dataRow = $this->dataRow($paysystemDataType, 'title');
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
                'order'        => 3,
            ])->save();

            $this->translate($dataRow, [
                'display_name' => __('seeders.data_rows.title', [], 'en'),
            ], 'en');

        }

        $dataRow = $this->dataRow($paysystemDataType, 'slug');
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
                'order' => 4,
            ])->save();

            $this->translate($dataRow, [
                'display_name' => __('seeders.data_rows.slug', [], 'en'),
            ], 'en');
        }

        $dataRow = $this->dataRow($paysystemDataType, 'picture');
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
                'order' => 5,
            ])->save();

            $this->translate($dataRow, [
                'display_name' => __('seeders.data_rows.picture', [], 'en'),
            ], 'en');
        }

        $dataRow = $this->dataRow($paysystemDataType, 'description');
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

        $dataRow = $this->dataRow($paysystemDataType, 'created_at');
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

        $dataRow = $this->dataRow($paysystemDataType, 'updated_at');
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
            'title'   => __('seeders.menu_items.paysystems'),
            'url'     => '',
            'route'   => 'voyager.paysystems.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-credit-cards',
                'color'      => null,
                'parent_id'  => $dictionariesMenuItem->id,
                'order'      => 3,
            ])->save();

            $this->translate($menuItem, [
                'title' => __('seeders.menu_items.paysystems', [], 'en'),
            ], 'en');

        }

        //Permissions
        Permission::generateFor('paysystems');

        $role = Role::where('name', 'admin')->firstOrFail();
        $permissions = Permission::where('table_name', 'paysystems');

        $role->permissions()->syncWithoutDetaching(
            $permissions->pluck('id')->all()
        );

        //Content
        $paysystem = Paysystem::firstOrNew([
            'slug' => 'terminal',
        ]);
        if (!$paysystem->exists) {
            $paysystem->fill([
                'title' => __('seeders.data.paysystems.terminal.title'),
                'order' => 1,
                'picture' => 'paysystems/seeders/credit-card.svg',
                'slug' => 'terminal',
            ])->save();

            $this->translate($paysystem, [
                'title' => __('seeders.data.paysystems.terminal.title', [], 'en'),
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
