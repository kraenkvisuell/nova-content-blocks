<?php

namespace Kraenkvisuell\NovaContentBlocks;

use Manogi\Tiptap\Tiptap;
use Laravel\Nova\Fields\Textarea;
use OptimistDigital\MediaField\MediaField;
use Whitecube\NovaFlexibleContent\Flexible;

class ContentBlock
{
    public function field()
    {
        return Flexible::make('Hauptinhalt', 'main_content')
            ->addLayout('Text', 'just_text', [
                Textarea::make('Überschrift', 'headline')
                    ->rows(2)
                    ->translatable(),
                Tiptap::make('Inhalt', 'content')
                    ->buttons([
                        'heading',
                        'bold',
                        'italic',
                        'link',
                    ])
                    ->headingLevels([1, 2, 3, 4, 5])
                    ->translatable()
                    ->stacked(),
            ])
            ->addLayout('Bild', 'image', [
                Textarea::make('Überschrift', 'headline')
                    ->rows(2)
                    ->translatable(),
                MediaField::make('Bild', 'image'),
                Tiptap::make('Bildunterschrift', 'caption')
                    ->buttons([
                        'bold',
                        'italic',
                        'link',
                    ])
                    ->translatable()
                    ->stacked(),
            ])
            ->addLayout('Bild | Text', 'image_text', [
                Textarea::make('Überschrift', 'headline')
                    ->rows(2)
                    ->translatable(),
                MediaField::make('Bild', 'image'),
                Tiptap::make('Bildunterschrift', 'caption')
                    ->buttons([
                        'bold',
                        'italic',
                        'link',
                    ])
                    ->translatable()
                    ->stacked(),
                Tiptap::make('Text', 'content')
                    ->buttons([
                        'heading',
                        'bold',
                        'italic',
                        'link',
                    ])
                    ->headingLevels([1, 2, 3, 4])
                    ->translatable()
                    ->stacked(),
            ])
            ->button('Inhaltsblock hinzufügen')
            ->stacked();
    }
}
