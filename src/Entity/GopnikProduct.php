<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GopnikProductRepository")
 */
class GopnikProduct implements \JsonSerializable
{
	/**
	 * @ORM\Id
	 * @ORM\GeneratedValue
	 * @ORM\Column(type="integer")
	 */
	private $id;

	/**
	 * @ORM\Column(type="string", length=255)
	 */
	private $name;

	/**
	 * @ORM\Column(type="integer")
	 */
	private $price;

	/**
	 * @ORM\Column(type="text")
	 */
	private $imageUrl;

	/**
	 * @ORM\Column(type="string", length=255)
	 */
	private $description;

	/**
	 * @ORM\Column(type="string", length=255)
	 */
	private $color;

	public function getId() : ?int
	{
		return $this->id;
	}

	public function getName() : ?string
	{
		return $this->name;
	}

	public function setName(string $name) : self
	{
		$this->name = $name;

		return $this;
	}

	public function getPrice() : ?int
	{
		return $this->price;
	}

	public function setPrice(int $price) : self
	{
		$this->price = $price;

		return $this;
	}

	public function getImageUrl() : ?string
	{
		return $this->imageUrl;
	}

	public function setImageUrl(string $imageUrl) : self
	{
		$this->imageUrl = $imageUrl;

		return $this;
	}

	public function getDescription() : ?string
	{
		return $this->description;
	}

	public function setDescription(string $description) : self
	{
		$this->description = $description;

		return $this;
	}

	public function getColor() : ?string
	{
		return $this->color;
	}

	public function setColor(string $color) : self
	{
		$this->color = $color;

		return $this;
	}

	public function jsonSerialize()
	{
		return [
			"id"          => $this->getId(),
			"name"        => $this->getName(),
			"price"       => $this->getPrice() / 100.0,
			"img_src"     => $this->getImageUrl(),
			"description" => $this->getDescription(),
			"color"       => $this->getColor(),
		];
	}
}