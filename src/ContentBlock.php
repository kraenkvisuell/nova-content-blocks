<?php

namespace Kraenkvisuell\NovaContentBlocks;

use Laravel\Nova\Fields\Select;
use Manogi\Tiptap\Tiptap;
use Laravel\Nova\Fields\Textarea;
use OptimistDigital\MediaField\MediaField;
use Whitecube\NovaFlexibleContent\Flexible;

class ContentBlock
{
    public function field()
    {
        $field = Flexible::make(__('main content'), 'main_content');

        foreach (config('nova-content-blocks.layouts') as $layoutKey => $layoutParams) {
            $field = ContentBlockLayout::addLayoutToField($field, $layoutKey, $layoutParams);

            // $field->addLayout(__('text'), 'text', [
            //     Textarea::make(__('headline'), 'headline')
            //         ->rows(2)
            //         ->translatable(),
            //     Tiptap::make(__('content'), 'content')
            //         ->buttons([
            //             'heading',
            //             'bold',
            //             'italic',
            //             'link',
            //             'blockquote',
            //         ])
            //         ->headingLevels([1, 2, 3, 4, 5])
            //         ->translatable()
            //         ->stacked(),
            // ])

            // ->addLayout(__('images'), 'images', [
            //     Textarea::make(__('headline'), 'headline')
            //         ->rows(2)
            //         ->translatable(),
            //     MediaField::make(__('images'), 'images'),
            //     Tiptap::make(__('image caption'), 'caption')
            //         ->buttons([
            //             'bold',
            //             'italic',
            //             'link',
            //             'blockquote',
            //         ])
            //         ->translatable()
            //         ->stacked(),
            // ])

            // ->addLayout(__('text and images'), 'images_text', [
            //     Textarea::make(__('headline'), 'headline')
            //         ->rows(2)
            //         ->translatable(),
            //     MediaField::make(__('images'), 'images')
            //         ->multiple()
            //         ->collection('page'),
            //     Tiptap::make(__('image caption'), 'caption')
            //         ->buttons([
            //             'bold',
            //             'italic',
            //             'link',
            //             'blockquote',
            //         ])
            //         ->translatable()
            //         ->stacked(),
            //     Tiptap::make(__('text'), 'content')
            //         ->buttons([
            //             'heading',
            //             'bold',
            //             'italic',
            //             'link',
            //             'blockquote',
            //         ])
            //         ->headingLevels([1, 2, 3, 4, 5])
            //         ->translatable()
            //         ->stacked(),
            //     Select::make(__('images position'), 'images_position')
            //         ->options([
            //             'left' => __('left'),
            //             'right' => __('right'),
            //             'top' => __('top'),
            //             'bottom' => __('bottom'),
            //         ])
            // ])
            // ->button(__('add content block'))
            // ->stacked();
        }

        return $field;
    }
}
