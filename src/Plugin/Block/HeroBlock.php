<?php

namespace Drupal\hero\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * @Block(
 * id = "hero_hero",
 * admin_label = @Translation("Example Hero Block"))
 */
class HeroBlock extends BlockBase
{
  public function build()
  {
    $heroes = [
      ['hero_name' => 'Hulk', 'real_name' => 'David Banner'],
      ['hero_name' => 'Thor', 'real_name' => 'Thor Odinson'],
      ['hero_name' => 'Iron Man', 'real_name' => 'Tony Stark'],
      ['hero_name' => 'Black Widow', 'real_name' => 'Natalia Romanova'],
      ['hero_name' => 'Wolverine', 'real_name' => 'James Howlett'],
    ];

    $table = [
      '#type' => 'table',
      '#header' => [
        $this->t('Hero Name'),
        $this->t('Real Name'),
      ]
    ];
    foreach ($heroes as $hero) {
      $table[] = [
        'hero_name' => [
          '#type' => 'markup',
          '#markup' => $hero['hero_name'],
        ],
        'real_name' => [
          '#type' => 'markup',
          '#markup' => $hero['real_name'],
        ],
      ];
    }
    return $table;
  }
}
