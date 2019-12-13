<?php

namespace Drupal\hero\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\hero\HeroArticleService;
use Drupal\Core\Config\ConfigFactory;
use Drupal\Core\Session\AccountProxy;

class HeroController extends ControllerBase
{
  private $heroArticleService;
  protected $configFactory;
  protected $currentUser;

  public static function create(ContainerInterface $container)
  {
    return new static(
      $container->get('hero.hero_articles'),
      $container->get('config.factory'),
      $container->get('current_user')
    );
  }

  public function __construct(HeroArticleService $service, ConfigFactory $configFactory, AccountProxy $currentUser)
  {
    $this->heroArticleService = $service;
    $this->configFactory = $configFactory;
    $this->currentUser = $currentUser;
  }

  public function heroList()
  {
    $heroes = [
      ['name' => 'Hulk'],
      ['name' => 'Thor'],
      ['name' => 'Iron Man'],
      ['name' => 'Black Widow'],
      ['name' => 'Captain America'],
      ['name' => 'Wolverine'],
    ];

    /*
    $ourHeroes = '';
    foreach ($heroes as $hero)
      $ourHeroes .= '<li>' . $hero['name'] . '</li>';

    return [
      '#type' => 'markup',
      '#markup' => '<h4>' . $this->t('Poll Results') . '</h4>'
        . '<ol>' . $ourHeroes . '</ol>',
    ];
    */

    if ($this->currentUser->hasPermission('can view hero list')) {
      return [
        '#theme' => 'hero_list',
        '#items' => $heroes,
        '#title' => $this->configFactory->get('hero.settings')->get('hero_list_title'),
      ];
    } else {
      return [
        '#theme' => 'hero_list',
        '#items' => [],
        '#title' => $this->configFactory->get('hero.settings')->get('hero_list_title'),
      ];
    }
  }
}
