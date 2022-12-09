<?php

namespace App\Entity;

use App\Repository\CategorieCreditRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieCreditRepository::class)]
class CategorieCredit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column()]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $NomCategorieCredit = null;

    #[ORM\OneToMany(mappedBy: 'Categorie1Credit', targetEntity: DemandeCredit::class)]
    private Collection $demandeCredits;

    public function __construct()
    {
        $this->demandeCredits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCategorieCredit(): ?string
    {
        return $this->NomCategorieCredit;
    }

    public function setNomCategorieCredit(string $NomCategorieCredit): self
    {
        $this->NomCategorieCredit = $NomCategorieCredit;

        return $this;
    }

    /**
     * @return Collection<int, DemandeCredit>
     */
    public function getDemandeCredits(): Collection
    {
        return $this->demandeCredits;
    }

    public function addDemandeCredit(DemandeCredit $demandeCredit): self
    {
        if (!$this->demandeCredits->contains($demandeCredit)) {
            $this->demandeCredits[] = $demandeCredit;
            $demandeCredit->setCategorie1Credit($this);
        }

        return $this;
    }

    public function removeDemandeCredit(DemandeCredit $demandeCredit): self
    {
        if ($this->demandeCredits->removeElement($demandeCredit)) {
            // set the owning side to null (unless already changed)
            if ($demandeCredit->getCategorie1Credit() === $this) {
                $demandeCredit->setCategorie1Credit(null);
            }
        }

        return $this;
    }
}
