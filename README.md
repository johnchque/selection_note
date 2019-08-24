# Selection note

Drupal 8 module for creating Relation entities between nodes based on text selection. Main maintainance is made in Drupal.org. This module displays a prompt when the user selects text in the View tab of a Node entity. Then it displays a Node creation form and when saving it creates a Relation entity linking both Nodes.

## Overview of the project's code

```
.
├── composer.json                       <- File for module integration with Composer.
├── config
│   └── schema
│       └── selection_note.schema.yml   <- Schema files for config structure.
├── css                                                                                                                                                        
│   └── selection-note.admin.css        <- Basic styling for module forms.
├── js
│   └── selection-note.admin.js         <- Basic js files for displaying the prompt on the View tab of nodes.
├── selection_note.info.yml             <- Info file for displaying the module in a Drupal installation.
├── selection_note.libraries.yml        <- Library files definitions for CSS and JS.
├── selection_note.links.menu.yml       <- Menu elements for config navigation.
├── selection_note.module               <- Module file for defining hooks when saving a Node.
├── selection_note.routing.yml          <- Routing file to define Drupal routes.
└── src
    └── Form
        └── SettingsForm.php            <- Configuration form.
```

## Prerequisites

1. You have to have a Drupal instance with the ability to install modules.

   | Operating System | Tutorial                                            |
   | ---------------- | --------------------------------------------------- |
   | Mac/Linux/Windows| https://www.drupal.org/download  |

2. Download the following modules:
    * [Entity reference revisions](https://www.drupal.org/project/entity_reference_revisions)
    * [Relation](https://www.drupal.org/project/relation) 

3. Download the module and install it.

4. Create a Relation Type and a the Content Type that will allow to add Relation entities.

## Using the module

1. To create a Relation between two nodes, access to the View tab of one already created and select some text. A prompt will appear, click it.

2. Fill the new Node form with the data you need and save.

3. The relation is already created between both nodes.

## Contributing
Contributions are very welcome. Please go [here](https://www.drupal.org/project/issues/selection_note?categories=All) and create an issue.