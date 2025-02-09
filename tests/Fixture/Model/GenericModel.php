<?php

/*
 * This file is part of the zenstruck/foundry package.
 *
 * (c) Kevin Bond <kevinbond@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zenstruck\Foundry\Tests\Fixture\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\ORM\Mapping as ORM;

/**
 * Used for ORM/Mongo tests.
 *
 * @author Kevin Bond <kevinbond@gmail.com>
 */
#[ORM\MappedSuperclass]
#[MongoDB\MappedSuperclass]
abstract class GenericModel
{
    #[ORM\Id]
    #[ORM\Column]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[MongoDB\Id(type: 'int', strategy: 'INCREMENT')]
    public ?int $id = null;

    #[ORM\Column]
    #[MongoDB\Field(type: 'string')]
    private string $prop1;

    #[ORM\Column(nullable: true)]
    #[MongoDB\Field(type: 'date_immutable', nullable: true)]
    private ?\DateTimeImmutable $date = null;


    #[ORM\OneToMany(targetEntity: GenericModelCollectionItem::class, mappedBy: 'genericModel', cascade: ['persist'])]
    #[MongoDB\Field()]
    private Collection $collection;

    /** @var list<string> */
    #[ORM\Column()]
    #[MongoDB\Field()]
    private array $otherCollection = [];

    public function __construct(string $prop1)
    {
        $this->prop1 = $prop1;
        $this->collection = new ArrayCollection();
    }

    public function getProp1(): string
    {
        return $this->prop1;
    }

    public function setProp1(string $prop1): void
    {
        $this->prop1 = $prop1;
    }

    public function getDate(): ?\DateTimeImmutable
    {
        return $this->date;
    }

    public function setDate(?\DateTimeImmutable $date): void
    {
        $this->date = $date;
    }

    public function getCollection(): Collection
    {
        return $this->collection;
    }

    public function addElementToCollection(GenericModelCollectionItem $element): void
    {
        $element->setGenericModel($this);
        $this->collection->add($element);
    }

    public function getOtherCollection(): array
    {
        return $this->otherCollection;
    }

    public function addElementToOtherCollection(string $element): void
    {
        $this->otherCollection[] = $element;
    }
}
