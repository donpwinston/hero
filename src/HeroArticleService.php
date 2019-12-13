<?php

namespace Drupal\hero;

use Drupal\Core\Entity\Query\QueryFactory;
use Drupal\Core\Entity\EntityManager;

class HeroArticleService
{

  private $entityQuery;
  private $entityManager;

  public function __construct(QueryFactory $entityQuery, EntityManager $entityManager)
  {
    $this->entityQuery = $entityQuery;
    $this->entityManager = $entityManager;
  }

  public function getHeroArticles()
  {
    $nids = $this->entityQuery->get('node')->condition('type', 'article')->execute();
    return $this->entityManager->getStorage('node')->loadMultiple($nids);
  }
}
