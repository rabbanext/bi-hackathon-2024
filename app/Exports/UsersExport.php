<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class UsersExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::all();
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
            $projectFileLink = $user->submitted == 1
                ? 'http://www.hackathon.fekdi.co.id/submitted/' . $user->project_file
                : 'http://www.hackathon.fekdi.co.id/saved/' . $user->project_file;
        }

        // Format Submit Date Time
        $submitDateTime = $user->submitted ? date('H:i:s d-m-Y', strtotime($user->updated_at)) : '-';

        // Main row
        $rows[] = [
            $rowNumber++,
            $user->team_name,
            $user->institution,
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
            isset($domiciles[0]) ? $domiciles[0] : null,
            isset($emails[0]) ? $emails[0] : null,
            isset($date_of_births[0]) ? date('d-m-Y', strtotime($date_of_births[0])) : null,
            isset($professions[0]) ? $professions[0] : null,
            isset($github_urls[0]) ? $github_urls[0] : null,
            isset($linkedin_urls[0]) ? $linkedin_urls[0] : null,

            isset($project_link[0]) ? $project_link[0] : null,
            isset($project_desc[0]) ? $project_desc[0] : null,
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

                    $members[$i],
                    isset($roles[$i]) ? $roles[$i] : null,
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
