<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="User")
 * @ORM\Entity
 */
class User
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=50, nullable=false, options={"default"="'0'"})
     */
    private $email = '\'0\'';

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=50, nullable=false, options={"default"="'0'"})
     */
    private $password = '\'0\'';

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=50, nullable=false, options={"default"="'0'"})
     */
    private $salt = '\'0\'';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $updated = 'current_timestamp()';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=false, options={"default"="current_timestamp()"})
     */
    private $created = 'current_timestamp()';

    /**
     * @var bool
     *
     * @ORM\Column(name="enabled", type="boolean", nullable=false)
     */
    private $enabled = '0';


}
