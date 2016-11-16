<?php
namespace Edu\Cnm\jmontoya306\cannaduceus;

/**
 * Cross section of cannaduceus strainLeafRating class
 *
 * This is just one strain out of many that will be rated
 *
 * @author James Montoya <jmontoya306@cnm.edu>
 *
 **/

class strainLeafRating {

	/**
	 * rating for the strain;
	 * @var int $strainLeafRatingRating
	 **/
	private $strainLeafRatingRating;

	/**
	 * strain Id from the strain class;
	 * @var int $strainLeafRatingStrainId
	 **/
	private $strainLeafRatingStrainId;

	/**
	 *profile Id from the profile class;
	 * @var int $strainLeafRatingProfileId
	 **/
	private $strainLeafRatingProfileId;


	/** Constructor for new strainLeafRating
	 *
	 * @param int | null $newStrainLeafRatingRating rating of this strain or null if a new strain
	 * @param int $newStrainLeafRatingStrainId the id of the strain from the strain class
	 * @param int $newStrainLeafRatingProfileId the id of the profile from the profile class
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 */

	public function __construct(int $newStrainLeafRatingRating = null, int $newStrainLeafRatingStrainId, int $newStrainLeafRatingProfileId) {
		try {
			$this->setStrainLeafRatingRating($newStrainLeafRatingRating);
			$this->setStrainLeafRatingStrainId($newStrainLeafRatingStrainId);
			$this->setStrainLeafRatingProfileId($newStrainLeafRatingProfileId);
		} Catch(\InvalidArgumentException $invalidArgumentException) {
			// rethrow the exception to the caller
			throw(new \InvalidArgumentException($invalidArgumentException->getMessage(), 0, $invalidArgumentException));
		} Catch(\RangeException $range) {
			// rethrow the exception to the caller
			throw(new \RangeException($range->getMessage(), 0, $range));
		} Catch(\TypeError $typeError) {
			//rethrow the exception to the caller
			throw(new \TypeError($typeError->getMessage(), 0, $typeError));
		} Catch(\Exception $exception) {
			//rethrow the exception to the caller
			throw(new \Exception($exception->getMessage(), 0, $exception));
		}
	}

	/**
	 * accessor method for strainLeafRatingRating
	 *
	 * @return int|null value of strainLeafRatingRating
	 */
	public function getStrainLeafRatingRating() {
		return $this->strainLeafRatingRating;
	}

	/**
	 * mutator method for strainLeafRatingRating
	 *
	 * @param int $newStrainLeafRatingRating new value of strainLeafRatingRating
	 * @throws \UnexpectedValueException if $newStrainLeafRatingRating is not an integer
	 */
	public function setStrainLeafRatingRating($newStrainLeafRatingRating) {
		$newStrainLeafRatingRating = filter_input($newStrainLeafRatingRating, FILTER_VALIDATE_INT);
		if($newStrainLeafRatingRating  ) {
			throw(new \UnexpectedValueException("Strain Leaf Rating is not a valid integer"));
		}

		//Convert and store the strainLeafRating rating
		$this->strainLeafRatingRating = int($newStrainLeafRatingRating);
	}


	/**
	 * accessor method for strainLeafRatingStrainId
	 *
	 * @return int of strainLeafRatingStrainId
	 */
	public function getStrainLeafRatingStrainId() {
		return $this->strainLeafRatingStrainId;
	}

	/**
	 * mutator method for strainLeafRatingStrainId
	 *
	 * @param int $newStrainLeafRatingStrainId new var of strainLeafRatingStrainId
	 * @throws \UnexpectedValueException if $newStrainLeafRatingStrainId is not a int
	 */
	public function setStrainLeafRatingStrainId($newStrainLeafRatingStrainId) {
		$newStrainLeafRatingStrainId = filter_input($newStrainLeafRatingStrainId, FILTER_SANITIZE_STRING);
		if($newStrainLeafRatingStrainId === false) {
			throw(new \UnexpectedValueException("Strain Leaf Rating Strain Id not valid"));
		}

		//Convert and store the strain name
		$this->strainLeafRatingStrainId = int($newStrainLeafRatingStrainId);
	}


	/**
	 * accessor method for strainLeafRatingProfileId
	 *
	 * @return int for strainLeafRatingProfileId
	 */
	public function getStrainLeafRatingProfileId() {
		return $this->strainLeafRatingProfileId;
	}

	/**
	 * mutator method for strainLeafRatingProfileId
	 *
	 * @param int $newStrainLeafRatingProfileId new strainLeafRatingProfileId
	 * @throws \UnexpectedValueException if $newStrainLeafRatingProfileId is not an int
	 */
	public function setStrainLeafRatingProfileId($newStrainLeafRatingProfileId) {
		$newStrainLeafRatingProfileId = filter_input($newStrainLeafRatingProfileId, FILTER_SANITIZE_STRING);
		if($newStrainLeafRatingProfileId === false) {
			throw(new \UnexpectedValueException("Strain Leaf Rating Profile Id Invalid"));
		}

		//Convert and store the strainLeafRatingProfileId
		$this->strainLeafRatingProfileId = int($newStrainLeafRatingProfileId);
	}

	/**
	 * inserts this Strain Leaf Rating into mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function insert(\PDO $pdo) {
		// enforce the strainLeafRatingRating is null (i.e., don't insert a strain that already exists)
		if($this->strainLeafRatingRating !== null) {
			throw(new \PDOException("not a new strain leaf rating"));
		}

		// create query template
		$query = "INSERT INTO strainLeafRating(strainLeafRatingRating, strainLeafRatingStrainId, strainLeafRatingProfileId) VALUES(:strainLeafRatingRating, :stainLeafRatingStrainId, :strainLeafRatingProfileId)";
		$statement = $pdo->prepare($query);


		// bind the member variables to the place holders in the template
		$parameters = ["strainLeafRatingRating" => $this->strainLeafRatingRating, "strainLeafRatingStrainId" => $this->strainLeafRatingStrainId, "strainLeafRatingProfileId" => $this->strainLeafRatingProfileId];
		$statement->execute($parameters);

		// udate null strainId with what mySQL just gave us
		$this->strainLeafRatingRating = intval($pdo->lastInsertId());

	}   // insert

	/**
	 * deletes this Strain Leaf Rating from mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 */
	public function delete(\PDO $pdo) {
		//enforce the strainId is not null (i.e., don't delete a strain that hasn't been inserted)
		if($this->strainLeafRatingRating === null) {
			throw(new \PDOException("unable to delete a strain leaf rating that does not exist"));
		}

		//Create Query Template
		$query = "DELETE FROM strainLeafRating WHERE strainLeafRatingRating = :strainLeafRatingRating";
		$statement = $pdo->prepare($query);

		//Bind the member variables to the place holder in the template
		$parameters = ["strainLeafRatingRating" => $this->strainLeafRatingRating];
		$statement->execute($parameters);
	}	//Delete

	/**
	 * Updates this Strain Leaf Rating in mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function update(\PDO $pdo) {
		//enforce the strainLeafRating is not null (i.e. don't update a strain leaf rating that hasn't been inserted)
		if($this->strainLeafRatingRating === null)	{
			throw(new \PDOException("unable to update strain leaf rating that does not exist"));
			// create query template
			$query = "UPDATE strainLeafRating SET strainLeafRatingRating = :strainLeafRatingRating, strainLeafRatingStrainId = :strainLeafRatingStrainId, strainLeafRatingProfileId = :strainLeafRatingProfileId WHERE strainLeafRatingRating = :strainLeafRatingRating";
			$statement = $pdo->prepare($query);

			//bind the member variables to the place holders in the template
			$parameteres = ["strainLeafRatingRating" => $this->strainLeafRatingRating, "strainLeafRatingStrainId" => $this->strainLeafRatingStrainId, "strainLeafRatingProfileId" => $this->strainLeafRatingProfileId];
			$statement->execute($parameteres);
		}
	}//update

	/**
	 * This function retrieves a Strain Leaf Rating by Dispensary Leaf Rating Rating
	 *
	 * @param \PDO $pdo -- a PDO connection
	 * @param  \int dispensaryLeafRating -- dispensary leaf rating to be retrieved
	 * @throws \InvalidArgumentException when $dispensaryLeafRating is not an integer
	 * @throws \RangeException when $dispensaryLeafRatingRating is too long
	 * @throws \PDOException
	 * @return null | $dispensaryLeafRating
	 */

	public static function getDispensaryLeafRatingByDispensaryLeafRatingRating(\PDO $pdo, $dispensaryLeafRating) {
		//  check validity of $strainName
		$dispensaryLeafRating = filter_string($dispensaryLeafRating, FILTER_SANITIZE_NUMBER_INT);
		if($dispensaryLeafRating <= 0) {
			throw(new \InvalidArgumentException("Dispensary Leaf Rating is not valid."));
		}
		if($dispensaryLeafRating === null) {
			throw(new \RangeException("Strain name does not exist."));
		}
		// prepare query
		$query = "SELECT dispensaryLeafRatingRating, dispensaryLeafRatingDispensaryId, dispensaryLeafRatingProfileId FROM dispensaryLeafRating WHERE dispensaryLeafRatingRating = :dispensaryLeafRatingRating";
		$statement = $pdo->prepare($query);
		$parameters = array("dispensaryLeafRating" => $dispensaryLeafRating);
		$statement->execute($parameters);
		//  setup results from query
		try {
			$dispensaryLeafRating = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$dispensaryLeafRating = new dispensaryLeafRating($row["dispensaryLeafRatingRating"], $row["dispensaryLeafRatingDispensryId"], $row["dispensaryLeafRatingProfileId"]);
			}
		} catch(\Exception $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return ($dispensaryLeafRating);
	}  // get by Strain Leaf Rating Rating

	/**
	 * formats the state variables for JSON serialization
	 *
	 * @return array resulting state variables to serialize
	 **/
	public function jsonSerialize() {
		$fields = get_object_vars($this);
		return($fields);
	}
}