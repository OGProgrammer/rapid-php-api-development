<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Application\Entity\Repository\NoteRepository")
 * @ORM\Table(name="notes")
 */
class Note
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="headline", type="string", nullable=true)
     */
    private $headline;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text", nullable=true)
     */
    private $body;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getHeadline()
    {
        return $this->headline;
    }

    /**
     * @param string $headline
     */
    public function setHeadline($headline)
    {
        $this->headline = $headline;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
	 * Return this object in array form.
     *
	 * @return array
     */
    public function toArray()
	{
		$data = get_object_vars($this);

	    foreach ($data as $attribute => $value) {
			if (is_object($value)) {
				$data[$attribute] = get_object_vars($value);
			}
		}

		return $data;
	}

	public function getArrayCopy()
	{
		return get_object_vars($this);
	}

	/**
     * Fill this object from an array
     */
    public function exchangeArray($data)
    {
		if ($data != null) {
			 foreach ($data as $attribute => $value) {
				 if (! property_exists($this, $attribute)) {
					 continue;
				 }
				 $this->$attribute = $value;
			 }
		}

		return $this;
    }
}
