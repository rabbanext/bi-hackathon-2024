<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UsersExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    protected $filter;

    public function __construct($params = [])
    {
        $this->filter = $params;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $query = User::query()->where('type', '=', '0');
        // logger($this->filter);

        if (isset($this->filter['submission-filter'])) {
            if ($this->filter['submission-filter'] === "submitted") {
                $query->whereNotNull('submitted');
            } elseif ($this->filter['submission-filter'] === "not-submitted") {
                $query->whereNull('submitted');
            }
        }

        if (isset($this->filter['submission-time'])) {
            $query->orderBy('updated_at', $this->filter['submission-time']);
        }

        if (isset($this->filter['project-file-filter'])) {
            if ($this->filter['project-file-filter'] === "uploaded") {
                $query->whereNotNull('project_file');
            } elseif ($this->filter['project-file-filter'] === "not-uploaded") {
                $query->whereNull('project_file');
            }
        }

        if (isset($this->filter['email-verified-filter'])) {
            if ($this->filter['email-verified-filter'] === "verified") {
                $query->whereNotNull('email_verified_at');
            } elseif ($this->filter['email-verified-filter'] === "not-verified") {
                $query->whereNull('email_verified_at');
            }
        }

        if (isset($this->filter['otp-verified-filter'])) {
            if ($this->filter['otp-verified-filter'] === "verified") {
                $query->whereNotNull('otp_verified_at');
            } elseif ($this->filter['otp-verified-filter'] === "not-verified") {
                $query->whereNull('otp_verified_at');
            }
        }

        if (isset($this->filter['categories-filter'])) {
            $query->where('submit_for', $this->filter['categories-filter']);
        }

        return $query->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'No.',
            'Team',
            'Institution',
            'Categories',
            'Email',
            'Email Verified',
            'WhatsApp',
            'WhatsApp Verified',

            'Project Status',
            'Project Link',
            'Submit Status',
            'Submit Date Time',

            'Member Name',
            'Member Role',
            'Member Identity',
            'Member Domicile',
            'Member Email',
            'Member Date of Birth',
            'Member Profession',
            'Member GitHub URL',
            'Member LinkedIn URL',

            'Additional Link',
            'Description Link',
        ];
    }

    /**
     * @param mixed $user
     *
     * @return array
     */
    public function map($user): array
    {
        static $rowNumber = 1;

        $phoneNumber = $user->nowa;
        if (substr($phoneNumber, 0, 1) === '0') {
            $phoneNumber = '0' . substr($phoneNumber, 1);
        } elseif (substr($phoneNumber, 0, 1) === '8') {
            $phoneNumber = '0' . $phoneNumber;
        }

        $members = json_decode($user->member_name);
        $roles = json_decode($user->member_role);
        $identities = json_decode($user->member_identity);
        $domiciles = json_decode($user->member_domicile);
        $emails = json_decode($user->member_email);
        $date_of_births = json_decode($user->member_date_of_birth);
        $professions = json_decode($user->member_profession);
        $github_urls = json_decode($user->member_github_url);
        $linkedin_urls = json_decode($user->member_linkedin_url);
        $project_link = json_decode($user->project_link);
        $project_desc = json_decode($user->project_desc);
        $rows = [];

        // Project file link
        $projectFileLink = null;
        if (!empty($user->project_file)) {
            $baseUrl = request()->getSchemeAndHttpHost();
            $projectFileLink = $user->submitted == 1
                ? $baseUrl . '/storage/submitted/' . $user->project_file
                : $baseUrl . '/storage/save/' . $user->project_file;
        }

        // Format Submit Date Time
        $submitDateTime = $user->submitted ? date('H:i:s d-m-Y', strtotime($user->updated_at)) : '-';

        // Main row
        $rows[] = [
            $rowNumber++,
            $user->team_name,
            $user->institution,
            $user->submit_for ? $user->submit_for : 'N/A',
            $user->email,
            $user->email_verified_at ? 'Verified' : 'Not Verified',
            $user->nowa ? $phoneNumber : '-',
            $user->otp_verified_at ? 'Verified' : 'Not Verified',

            $user->project_file ? 'Uploaded' : 'Not Uploaded',
            $projectFileLink,
            $user->submitted == 1 ? 'Submitted' : 'Not Submitted',
            $submitDateTime,

            isset($members[0]) ? $members[0] : null,
            isset($roles[0]) ? $roles[0] : null,
            isset($identities[0]) ? $identities[0] : null,
            isset($domiciles[0]) ? $domiciles[0] : null,
            isset($emails[0]) ? $emails[0] : null,
            isset($date_of_births[0]) ? date('d-m-Y', strtotime($date_of_births[0])) : null,
            isset($professions[0]) ? $professions[0] : null,
            isset($github_urls[0]) ? $github_urls[0] : null,
            isset($linkedin_urls[0]) ? $linkedin_urls[0] : null,

            isset($project_link[0]) ? $project_link[0] : null,
            isset($project_desc[0]) ? $project_desc[0] : null,

            $is_finalis = $user->is_finalis ? 'Yes' : 'No',
        ];

        // Additional rows for each member
        if (is_array($members)) {
            for ($i = 1; $i < count($members); $i++) {
                $rows[] = [
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',

                    '',
                    '',
                    '',
                    '',

                    $members[$i],
                    isset($roles[$i]) ? $roles[$i] : null,
                    isset($identities[$i]) ? $identities[$i] : null,
                    isset($domiciles[$i]) ? $domiciles[$i] : null,
                    isset($emails[$i]) ? $emails[$i] : null,
                    isset($date_of_births[$i]) ? date('d-m-Y', strtotime($date_of_births[$i])) : null,
                    isset($professions[$i]) ? $professions[$i] : null,
                    isset($github_urls[$i]) ? $github_urls[$i] : null,
                    isset($linkedin_urls[$i]) ? $linkedin_urls[$i] : null,

                    '',
                    '',
                ];
            }
        }
        
        // Additional rows for each member
        if (is_array($project_link)) {
            for ($i = 1; $i < count($project_link); $i++) {
                $rows[] = [
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',

                    '',
                    '',
                    '',
                    '',

                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',
                    '',

                    isset($project_link[$i]) ? $project_link[$i] : null,
                    isset($project_desc[$i]) ? $project_desc[$i] : null,
                ];
            }
        }

        return $rows;
    }

    /**
     * @param Worksheet $sheet
     *
     * @return array
     */
    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
