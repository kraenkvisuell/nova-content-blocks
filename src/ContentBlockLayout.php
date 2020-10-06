<?php

namespace Kraenkvisuell\NovaContentBlocks;

use Manogi\Tiptap\Tiptap;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Textarea;
use ClassicO\NovaMediaLibrary\MediaLibrary;

class ContentBlockLayout
{
    public static function addLayoutToField($field, $layoutKey, $layoutParams)
    {
        $subFields = [];

        foreach (config('nova-content-blocks.available_fields') as $availableField) {
            if (in_array($availableField, $layoutParams['fields'])) {
                if ($availableField == 'headline') {
                    $subFields[] = Textarea::make(__('headline'), $availableField)
                        ->rows(2)
                        ->translatable();
                } elseif ($availableField == 'text') {
                    $subFields[] = Tiptap::make(__('text'), $availableField)
                        ->buttons([
                            'heading',
                            'bold',
                            'italic',
                            'link',
                            'blockquote',
                            'bullet_list',
                        ])
                        ->headingLevels([1, 2, 3, 4, 5])
                        ->translatable()
                        ->stacked();
                } elseif ($availableField == 'images') {
                    $subFields[] = MediaLibrary::make(__('images'), $availableField)
                        ->array();
                } elseif ($availableField == 'images_caption') {
                    $subFields[] = Tiptap::make(__('image caption'), 'caption')
                        ->buttons([
                            'bold',
                            'italic',
                            'link',
                            'blockquote',
                        ])
                        ->translatable()
                        ->stacked();
                } elseif ($availableField == 'images_position') {
                    $subFields[] = Select::make(__('images position'), 'images_position')
                        ->options([
                            'left' => __('left'),
                            'right' => __('right'),
                            'top' => __('top'),
                            'bottom' => __('bottom'),
                        ]);
                }
            }
        }

        $field->addLayout(__($layoutParams['label']), $layoutKey, $subFields);

        return $field;
    }
}
