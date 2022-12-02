<div id="pdsCLean_10301" align=center x:publishsource="Excel">

    <table border=0 cellpadding=0 cellspacing=0 width=825 class=xl6610301
        style='border-collapse:collapse;table-layout:fixed;width:inherit;'>
        <col class=xl6610301 width=23 style='mso-width-source:userset;mso-width-alt:
             841;width:17pt'>
        <col class=xl6610301 width=44 style='mso-width-source:userset;mso-width-alt:
             1609;width:33pt'>
        <col class=xl6610301 width=68 style='mso-width-source:userset;mso-width-alt:
             2486;width:51pt'>
        <col class=xl6610301 width=74 style='mso-width-source:userset;mso-width-alt:
             2706;width:56pt'>
        <col class=xl6610301 width=49 style='mso-width-source:userset;mso-width-alt:
             1792;width:37pt'>
        <col class=xl6610301 width=90 style='mso-width-source:userset;mso-width-alt:
             3291;width:68pt'>
        <col class=xl6610301 width=48 span=2
            style='mso-width-source:userset;
             mso-width-alt:1755;width:36pt'>
        <col class=xl6610301 width=123 style='mso-width-source:userset;mso-width-alt:
             4498;width:92pt'>
        <col class=xl6610301 width=59 style='mso-width-source:userset;mso-width-alt:
             2157;width:44pt'>
        <col class=xl6610301 width=65 style='mso-width-source:userset;mso-width-alt:
             2377;width:49pt'>
        <col class=xl6610301 width=78 style='mso-width-source:userset;mso-width-alt:
             2852;width:59pt'>
        <col class=xl6610301 width=56 style='mso-width-source:userset;mso-width-alt:
             2048;width:42pt'>
        <tr height=4 style='mso-height-source:userset;height:3.0pt'>
            <td colspan=13 height=4 class=xl9910301 width=825
                style='border-right:1.0pt solid black;
              height:3.0pt;width:620pt'><a
                    name="RANGE!A1:M48">&nbsp;</a></td>
        </tr>
        <tr height=24 style='mso-height-source:userset;height:18.0pt'>
            <td colspan=13 height=24 class=xl14310301
                style='border-right:1.0pt solid black;
              height:18.0pt'>IV.<span style='mso-spacerun:yes'>
                </span>CIVIL SERVICE
                ELIGIBILITY</td>
        </tr>
        <tr height=20 style='mso-height-source:userset;height:12.0pt'>
            <td height=20 class=xl6710301 style='height:12.0pt;border-top:none'>27.</td>
            <td colspan=4 rowspan=2 class=xl12110301 width=235
                style='border-right:.5pt solid black;
              border-bottom:.5pt solid black;width:177pt'>
                CAREER SERVICE/ RA 1080 (BOARD/
                BAR) UNDER SPECIAL LAWS/ CES/ CSEE<span style='mso-spacerun:yes'>
                </span>BARANGAY ELIGIBILITY / DRIVER'S LICENSE</td>
            <td rowspan=2 class=xl11710301 width=90 style='border-top:none;width:68pt'>RATING<br>
                (If Applicable)</td>
            <td colspan=2 rowspan=2 class=xl11910301 width=96
                style='border-right:.5pt solid black;
              border-bottom:.5pt solid black;width:72pt'>DATE
                OF EXAMINATION / CONFERMENT</td>
            <td colspan=3 rowspan=2 class=xl11910301 width=247
                style='border-right:.5pt solid black;
              border-bottom:.5pt solid black;width:185pt'>
                PLACE OF EXAMINATION / CONFERMENT</td>
            <td colspan=2 class=xl14910301 style='border-right:1.0pt solid black;
              border-left:none'>
                LICENSE (if applicable)</td>
        </tr>
        <tr height=34 style='mso-height-source:userset;height:25.5pt'>
            <td height=34 class=xl6810301 style='height:25.5pt'>&nbsp;</td>
            <td class=xl6910301 style='border-top:none;border-left:none'>NUMBER</td>
            <td class=xl7010301 width=56 style='border-top:none;border-left:none;
              width:42pt'>Date
                of<br>
                Validity</td>
        </tr>

        <input type="hidden" value="{{ $itemno = 0 }}">
        @forelse ($user->pdsCivilService as $civil)
            <input type="hidden" value="{{ $itemno = $loop->iteration }}">
            @if ($itemno < 7)
                <tr height=36 style='mso-height-source:userset;height:24.0pt'>
                    <td colspan=5 height=36 class=xl10710301 width=258 style='height:24.0pt;
          width:194pt'>
                        {{ $civil->CSCareer }}
                    </td>
                    <td class=xl7110301 width=90 style='border-left:none;width:68pt'>{{ $civil->CSRating }}</td>
                    <td colspan=2 class=xl13810301 width=96 style='border-left:none;width:72pt'>
                        {{ date('m-d-Y', strtotime($civil->CSDate)) }}</td>
                    <td colspan=3 class=xl10610301 width=247 style='border-left:none;width:185pt'>
                        {{ $civil->CSPlaceExam }}</td>
                    <td class=xl7210301 width=78 style='border-left:none;width:59pt'>{{ $civil->CSnumber }}</td>
                    <td class=xl7310301 width=56 style='border-left:none;width:42pt'>{{ $civil->CSDateValid }}</td>
                </tr>
            @endif
        @empty
        @endforelse

        @for ($i = $itemno; $i < 7; $i++)

        <tr height=36 style='mso-height-source:userset;height:24.0pt'>
            <td colspan=5 height=36 class=xl10710301 width=258 style='height:24.0pt;
              width:194pt'>
                &nbsp;</td>
            <td class=xl7110301 width=90 style='border-top:none;border-left:none;
              width:68pt'>&nbsp;
            </td>
            <td colspan=2 class=xl13810301 width=96 style='border-left:none;width:72pt'>&nbsp;</td>
            <td colspan=3 class=xl10610301 width=247 style='border-left:none;width:185pt'>&nbsp;</td>
            <td class=xl7210301 width=78 style='border-top:none;border-left:none;
              width:59pt'>&nbsp;
            </td>
            <td class=xl7310301 width=56 style='border-top:none;border-left:none;
              width:42pt'>&nbsp;
            </td>
        </tr>
        @endfor
        <tr class=xl6610301 height=16 style='mso-height-source:userset;height:12.0pt'>
            <td colspan=13 height=16 class=xl14610301
                style='border-right:1.0pt solid black;
              height:12.0pt'>(Continue on separate sheet if
                necessary)</td>
        </tr>
        <tr height=24 style='mso-height-source:userset;height:18.0pt'>
            <td colspan=13 height=24 class=xl10310301
                style='border-right:1.0pt solid black;
              height:18.0pt'>V.<span style='mso-spacerun:yes'>
                </span>WORK EXPERIENCE<span style='mso-spacerun:yes'></span></td>
        </tr>
        <tr class=xl6610301 height=16 style='mso-height-source:userset;height:12.0pt'>
            <td height=16 class=xl7710301 colspan=12 style='height:12.0pt'>(Include
                private employment.<span style='mso-spacerun:yes'> </span>Start from your
                recent work) Description of duties should be indicated in the attached Work
                Experience sheet.</td>
            <td class=xl7810301>&nbsp;</td>
        </tr>
        <tr height=24 style='mso-height-source:userset;height:18.0pt'>
            <td height=24 class=xl6810301 style='height:18.0pt'>28.</td>
            <td colspan=2 rowspan=2 class=xl10910301 width=112
                style='border-right:.5pt solid black;
              border-bottom:.5pt solid black;width:84pt'>
                INCLUSIVE DATES (mm/dd/yyyy)</td>
            <td colspan=3 rowspan=3 class=xl10810301 width=213
                style='border-right:.5pt solid black;
              border-bottom:.5pt solid black;width:161pt'>
                POSITION TITLE<span style='mso-spacerun:yes'>
                </span>(Write in full/Do not abbreviate)</td>
            <td colspan=3 rowspan=3 class=xl10810301 width=219
                style='border-right:.5pt solid black;
              border-bottom:.5pt solid black;width:164pt'>
                DEPARTMENT / AGENCY / OFFICE /
                COMPANY<span style='mso-spacerun:yes'>
                </span>(Write in full/Do not abbreviate)</td>
            <td rowspan=3 class=xl13210301 width=59 style='border-bottom:.5pt solid black;
              width:44pt'>
                MONTHLY SALARY</td>
            <td rowspan=3 class=xl13410301 width=65 style='border-bottom:.5pt solid black;
              width:49pt'>
                SALARY/ JOB/ PAY GRADE (if
                applicable)&amp; STEP<span style='mso-spacerun:yes'> </span>(Format &quot;00-0&quot;)/ INCREMENT
            </td>
            <td rowspan=3 class=xl15310301 width=78 style='border-bottom:.5pt solid black;
              width:59pt'>
                STATUS OF APPOINTMENT</td>
            <td rowspan=3 class=xl15110301 width=56 style='border-bottom:.5pt solid black;
              width:42pt'>
                GOV'T SERVICE<span style='mso-spacerun:yes'>
                </span>(Y/ N)</td>
        </tr>
        <tr height=20 style='mso-height-source:userset;height:12.0pt'>
            <td height=20 class=xl7910301 style='height:12.0pt'>&nbsp;</td>
        </tr>
        <tr height=25 style='mso-height-source:userset;height:18.75pt'>
            <td colspan=2 height=25 class=xl13010301
                style='border-right:.5pt solid black;
              height:18.75pt'>From</td>
            <td class=xl8010301 style='border-top:none;border-left:none'>To</td>
        </tr>


        <input type="hidden" value="{{ $itemno = 0 }}">
        @forelse ($user->pdsWorkExperience->sortByDesc('WEidfrom') as $work)
            <input type="hidden" value="{{ $itemno = $loop->iteration }}">
            @if ($itemno < 28)

            <tr height=32 style='mso-height-source:userset;height:22.5pt'>
                <td colspan=2 height=32 class=xl9510301 width=67 style='height:22.5pt;
                  width:50pt'>{{ date('m-d-Y', strtotime($work->WEidfrom)) }}
                </td>
                <td class=xl9510301 width=68 style='border-top:none;width:51pt'>{{ date('m-d-Y', strtotime($work->WEidto)) }}</td>
                <td colspan=3 class=xl7210301 width=213 style='border-left:none;width:161pt;font-size:11px;'>{{ $work->WEpostit }}</td>
                <td colspan=3 class=xl8310301 width=219 style='border-left:none;width:164pt'>{{ $work->WEdepagen }}</td>
                <td class=xl9310301 width=59 style='border-top:none;border-left:none;
                  width:44pt'>{{ $work->WEmonthsal }}
                </td>
                <td class=xl8310301 width=65 style='border-top:none;border-left:none;
                  width:49pt'>{{ $work->WEsalaryjob }}
                </td>
                <td class=xl8310301 width=78 style='border-top:none;border-left:none;
                  width:59pt'>{{ $work->WEstatus }}
                </td>
                <td class=xl8410301 width=56 style='border-top:none;border-left:none;
                  width:42pt'>{{ $work->WEgovser }}
                </td>
            </tr>
            @endif
        @empty
        @endforelse

        @for ($i = $itemno; $i < 28; $i++)

        <tr height=32 style='mso-height-source:userset;height:22.5pt'>
            <td colspan=2 height=32 class=xl9510301 width=67 style='height:22.5pt;
              width:50pt'>&nbsp;
            </td>
            <td class=xl9510301 width=68 style='border-top:none;width:51pt'>&nbsp;</td>
            <td colspan=3 class=xl7210301 width=213 style='border-left:none;width:161pt'>&nbsp;</td>
            <td colspan=3 class=xl8310301 width=219 style='border-left:none;width:164pt'>&nbsp;</td>
            <td class=xl9310301 width=59 style='border-top:none;border-left:none;
              width:44pt'>&nbsp;
            </td>
            <td class=xl8310301 width=65 style='border-top:none;border-left:none;
              width:49pt'>&nbsp;
            </td>
            <td class=xl8310301 width=78 style='border-top:none;border-left:none;
              width:59pt'>&nbsp;
            </td>
            <td class=xl8410301 width=56 style='border-top:none;border-left:none;
              width:42pt'>&nbsp;
            </td>
        </tr>
    @endfor

        <tr height=13 style='mso-height-source:userset;height:9.75pt'>
            <td colspan=13 height=13 class=xl12310301
                style='border-right:1.0pt solid black;
              height:9.75pt'>(Continue on separate sheet if
                necessary)</td>
        </tr>
        <tr height=37 style='mso-height-source:userset;height:27.75pt'>
            <td colspan=3 height=37 class=xl9610301 width=135
                style='border-right:1.0pt solid black;
              height:27.75pt;width:101pt'>SIGNATURE</td>
            <td colspan=5 class=xl13910301 style='border-right:1.0pt solid black;
              border-left:none'>
                &nbsp;</td>
            <td class=xl8910301 style='border-left:none'>DATE</td>
            <td class=xl9010301 style='border-left:none'>&nbsp;</td>
            <td class=xl9110301>&nbsp;</td>
            <td class=xl9110301>&nbsp;</td>
            <td class=xl9210301>&nbsp;</td>
        </tr>
        <tr height=12 style='mso-height-source:userset;height:9.0pt'>
            <td colspan=13 height=12 class=xl12210301 style='height:9.0pt'><span style='mso-spacerun:yes'>
                </span>CS FORM 212
                (Revised 2017), Page 2 of 4</td>
        </tr>
        <![if supportMisalignedColumns]>
        <tr height=0 style='display:none'>
            <td width=23 style='width:17pt'></td>
            <td width=44 style='width:33pt'></td>
            <td width=68 style='width:51pt'></td>
            <td width=74 style='width:56pt'></td>
            <td width=49 style='width:37pt'></td>
            <td width=90 style='width:68pt'></td>
            <td width=48 style='width:36pt'></td>
            <td width=48 style='width:36pt'></td>
            <td width=123 style='width:92pt'></td>
            <td width=59 style='width:44pt'></td>
            <td width=65 style='width:49pt'></td>
            <td width=78 style='width:59pt'></td>
            <td width=56 style='width:42pt'></td>
        </tr>
        <![endif]>
    </table>

</div>
