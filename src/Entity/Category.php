<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation;

/**
 * @ORM\Table(name="categories")
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 * @Annotation\ExclusionPolicy("ALL")
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Annotation\Expose()
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="children")
     * @ORM\JoinColumn(referencedColumnName="id", onDelete="CASCADE")
     */
    private $parent;

    /**
     * @ORM\OneToMany(targetEntity="Category", mappedBy="parent", cascade={"persist"})
     */
    private $children;

    /**
     * @ORM\Column(name="name", type="string", length=50)
     * @Annotation\Expose()
     */
    private $name;

    /**
     * @ORM\Column(name="locale_id", type="string", length=2, options={"default" = "en"})
     */
    private $localeId;

    /**
     * Category constructor.
     */
    public function __construct()
    {
        $this->children = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLocaleId(): ?string
    {
        return $this->localeId;
    }

    public function setLocaleId(string $localeId): self
    {
        $this->localeId = $localeId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getParent(): ?Category
    {
        return $this->parent;
    }

    /**
     * @param mixed $parent
     * @return Category
     */
    public function setParent(Category $parent)
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * @param Category $parent
     * @return $this
     */
    public function addChild(Category $parent)
    {
        $this->children->add($parent);
        return $this;
    }

    /**
     * @param Category $parent
     */
    public function removeChild(Category $parent)
    {
        $this->children->removeElement($parent);
    }

    /**
     * @return mixed|Category[]
     */
    public function getChildren()
    {
        return $this->children;
    }

}
