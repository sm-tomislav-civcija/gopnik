<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GopnikVideoRepository")
 */
class GopnikVideo implements \JsonSerializable
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
	private $title;

	/**
	 * @ORM\Column(type="text")
	 */
	private $text;

	/**
	 * @ORM\Column(type="text")
	 */
	private $videoUrl;

	public function getId() : ?int
	{
		return $this->id;
	}

	public function getTitle() : ?string
	{
		return $this->title;
	}

	public function setTitle(string $title) : self
	{
		$this->title = $title;

		return $this;
	}

	public function getText() : ?string
	{
		return $this->text;
	}

	public function setText(string $text) : self
	{
		$this->text = $text;

		return $this;
	}

	public function getVideoUrl() : ?string
	{
		return $this->videoUrl;
	}

	public function setVideoUrl(string $videoUrl) : self
	{
		$this->videoUrl = $videoUrl;

		return $this;
	}

	public function jsonSerialize()
	{
		return [
			"id"      => $this->getId(),
			"title"    => $this->getTitle(),
			"text"   => $this->getText(),
			"video_url" => $this->getVideoUrl(),
		];
	}
}