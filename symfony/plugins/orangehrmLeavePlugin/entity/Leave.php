<?php
/**
 * OrangeHRM is a comprehensive Human Resource Management (HRM) System that captures
 * all the essential functionalities required for any enterprise.
 * Copyright (C) 2006 OrangeHRM Inc., http://www.orangehrm.com
 *
 * OrangeHRM is free software; you can redistribute it and/or modify it under the terms of
 * the GNU General Public License as published by the Free Software Foundation; either
 * version 2 of the License, or (at your option) any later version.
 *
 * OrangeHRM is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with this program;
 * if not, write to the Free Software Foundation, Inc., 51 Franklin Street, Fifth Floor,
 * Boston, MA  02110-1301, USA
 */

namespace OrangeHRM\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="ohrm_leave")
 * @ORM\Entity
 */
class Leave
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private int $id;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private DateTime $date;

    /**
     * @var string
     *
     * @ORM\Column(name="length_hours", type="decimal", precision=6, scale=2, options={"unsigned":true})
     */
    private string $lengthHours;

    /**
     * @var string
     *
     * @ORM\Column(name="length_days", type="decimal", precision=6, scale=4, options={"unsigned":true})
     */
    private string $lengthDays;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="smallint", length=6)
     */
    private int $status;

    /**
     * @var string|null
     *
     * @ORM\Column(name="comments", type="string", length=256, nullable=true)
     */
    private ?string $comments = null;

    /**
     * @var LeaveRequest
     *
     * @ORM\ManyToOne(targetEntity="OrangeHRM\Entity\LeaveRequest")
     * @ORM\JoinColumn(name="leave_request_id", referencedColumnName="id")
     */
    private LeaveRequest $leaveRequest;

    /**
     * @var LeaveType
     *
     * @ORM\ManyToOne(targetEntity="OrangeHRM\Entity\LeaveType")
     * @ORM\JoinColumn(name="leave_type_id", referencedColumnName="id")
     */
    private LeaveType $leaveType;

    /**
     * @var Employee
     *
     * @ORM\ManyToOne(targetEntity="OrangeHRM\Entity\Employee")
     * @ORM\JoinColumn(name="emp_number", referencedColumnName="emp_number")
     */
    private Employee $employee;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="start_time", type="time", nullable=true)
     */
    private DateTime $startTime;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="end_time", type="time", nullable=true)
     */
    private DateTime $endTime;

    /**
     * @var int
     *
     * @ORM\Column(name="duration_type", type="integer", options={"default":0})
     */
    private int $durationType;
}