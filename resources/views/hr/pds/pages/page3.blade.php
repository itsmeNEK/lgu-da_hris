<div id="pdsCLean_28742" align=center x:publishsource="Excel">

    <table border=0 cellpadding=0 cellspacing=0 class=xl6528742
        style="width: inherit; max-height: 1500px; border-collapse:collapse;table-layout:fixed;">
        <col class=xl6528742 width=26 style='mso-width-source:userset;mso-width-alt:
             950;width:20pt'>
        <col class=xl6528742 width=214 style='mso-width-source:userset;mso-width-alt:
             7826;width:161pt'>
        <col class=xl6528742 width=22 style='mso-width-source:userset;mso-width-alt:
             804;width:17pt'>
        <col class=xl6528742 width=145 style='mso-width-source:userset;mso-width-alt:
             5302;width:109pt'>
        <col class=xl6528742 width=72 style='mso-width-source:userset;mso-width-alt:
             2633;width:54pt'>
        <col class=xl6528742 width=71 span=2
            style='mso-width-source:userset;
             mso-width-alt:2596;width:53pt'>
        <col class=xl6528742 width=79 style='mso-width-source:userset;mso-width-alt:
             2889;width:59pt'>
        <col class=xl6528742 width=21 style='mso-width-source:userset;mso-width-alt:
             768;width:16pt'>
        <col class=xl6528742 width=32 style='mso-width-source:userset;mso-width-alt:
             1170;width:23pt'>
        <col class=xl6528742 width=183 style='mso-width-source:userset;mso-width-alt:
             6692;width:137pt'>
        <tr height=4 style='mso-height-source:userset;height:3.0pt'>
            <td colspan=11 height=4 class=xl12328742 width=936
                style='border-right:1.0pt solid black;
              height:3.0pt;width:703pt'><a
                    name="RANGE!A1:K51">&nbsp;</a></td>
        </tr>
        <tr height=30 style='mso-height-source:userset;height:16pt'>
            <td colspan=11 height=30 class=xl13228742 style='border-right:1.0pt solid black;
              height:16pt'>
                VI. VOLUNTARY WORK OR
                INVOLVEMENT IN CIVIC / NON-GOVERNMENT /
                PEOPLE / VOLUNTARY ORGANIZATION/S</td>
        </tr>
        <tr height=20 style='mso-height-source:userset;height:15.0pt'>
            <td rowspan=2 height=35 class=xl14028742 style='height:26.25pt;border-top:
              none'>29.</td>
            <td colspan=3 rowspan=2 class=xl15228742 width=381
                style='border-right:.5pt solid black;
              width:287pt'>NAME &amp; ADDRESS OF
                ORGANIZATION<span style='mso-spacerun:yes'>
                </span>(Write in full)</td>
            <td colspan=2 rowspan=2 class=xl10928742 width=143
                style='border-right:.5pt solid black;
              border-bottom:.5pt solid black;width:107pt'>
                INCLUSIVE DATES<span style='mso-spacerun:yes'>
                </span>(mm/dd/yyyy)</td>
            <td rowspan=3 class=xl18928742 width=71
                style='border-bottom:.5pt solid black;
              border-top:none;width:53pt'>NUMBER OF HOURS
            </td>
            <td colspan=4 rowspan=3 class=xl10728742 width=315
                style='border-right:1.0pt solid black;
              border-bottom:.5pt solid black;width:236pt'>
                POSITION / NATURE OF WORK</td>
        </tr>
        <tr height=15 style='mso-height-source:userset;height:11.25pt'>
        </tr>
        <tr height=18 style='mso-height-source:userset;height:13.5pt'>
            <td height=18 class=xl6728742 style='height:13.5pt'>&nbsp;</td>
            <td colspan=3 class=xl15628742 width=381 style='border-right:.5pt solid black;
              width:287pt'>
                &nbsp;</td>
            <td class=xl6828742 style='border-top:none'>From</td>
            <td class=xl6628742 style='border-top:none;border-left:none'>To</td>
        </tr>


        <input type="hidden" value="{{ $itemno = 0 }}">
        @forelse ($user->pdsVoluntaryWork as $volun)
            <input type="hidden" value="{{ $itemno = $loop->iteration }}">
            @if ($itemno < 7)
                <tr height=37 style='mso-height-source:userset;height:21pt'>
                    <td colspan=4 height=37 class=xl15828742 width=407
                        style='border-right:.5pt solid black;
              height:21pt;width:307pt'>
                        {{ $volun->VWname }}</td>
                    <td class=xl6928742 style='border-top:none;border-left:none'>
                        {{ date('m-d-Y', strtotime($volun->VWidfrom)) }}</td>
                    <td class=xl6928742 style='border-top:none;border-left:none'>
                        {{ date('m-d-Y', strtotime($volun->VWidto)) }}</td>
                    <td class=xl7028742 style='border-top:none;border-left:none'>{{ $volun->VWNumHours }}</td>
                    <td colspan=4 class=xl19028742
                        style='border-right:1.0pt solid black;
              border-left:none'>{{ $volun->VWpostion }}
                    </td>
                </tr>
            @endif
        @empty
        @endforelse

        @for ($i = $itemno; $i < 7; $i++)
            <tr height=37 style='mso-height-source:userset;height:21pt'>
                <td colspan=4 height=37 class=xl18028742 width=407
                    style='border-right:.5pt solid black;
              height:21pt;width:307pt'>&nbsp;</td>
                <td class=xl7128742 style='border-top:none;border-left:none'>&nbsp;</td>
                <td class=xl7128742 style='border-top:none;border-left:none'>&nbsp;</td>
                <td class=xl7228742 style='border-top:none;border-left:none'>&nbsp;</td>
                <td colspan=4 class=xl12728742 style='border-right:1.0pt solid black;
              border-left:none'>
                    &nbsp;</td>
            </tr>
        @endfor



        <tr height=15 style='mso-height-source:userset;height:11.25pt'>
            <td colspan=11 height=15 class=xl11928742
                style='border-right:1.0pt solid black;
              height:11.25pt'>(Continue on separate sheet if
                necessary)</td>
        </tr>
        <tr class=xl6528742 height=24 style='mso-height-source:userset;height:18.0pt'>
            <td colspan=11 height=24 class=xl18328742 width=936
                style='border-right:1.0pt solid black;
              height:18.0pt;width:703pt'>VII.<span
                    style='mso-spacerun:yes'>
                </span>LEARNING AND DEVELOPMENT (L&amp;D) INTERVENTIONS/TRAINING PROGRAMS
                ATTENDED</td>
        </tr>
        <tr height=24 style='mso-height-source:userset;height:18.0pt'>
            <td rowspan=2 height=58 class=xl12628742 style='height:43.5pt'>30.</td>
            <td colspan=3 rowspan=3 class=xl10328742 width=381
                style='border-right:.5pt solid black;
              border-bottom:.5pt solid black;width:287pt'>
                TITLE OF LEARNING AND DEVELOPMENT
                INTERVENTIONS/TRAINING PROGRAMS<span style='mso-spacerun:yes'> </span>(Write in
                full)</td>
            <td colspan=2 rowspan=2 class=xl10328742 width=143
                style='border-right:.5pt solid black;
              border-bottom:.5pt solid black;width:107pt'>
                INCLUSIVE DATES OF
                ATTENDANCE<span style='mso-spacerun:yes'>
                </span>(mm/dd/yyyy)</td>
            <td rowspan=3 class=xl11428742 width=71 style='border-bottom:.5pt solid black;
              width:53pt'>
                NUMBER OF HOURS</td>
            <td rowspan=3 class=xl11228742 width=79 style='border-bottom:.5pt solid black;
              width:59pt'>
                Type of LD<br>
                <span style='mso-spacerun:yes'></span>( Managerial/ Supervisory/<br>
                Technical/etc)<span style='mso-spacerun:yes'></span>
            </td>
            <td colspan=3 rowspan=3 class=xl10228742 width=236
                style='border-right:1.0pt solid black;
              border-bottom:.5pt solid black;width:177pt'>
                <span style='mso-spacerun:yes'></span>CONDUCTED/ SPONSORED BY<span style='mso-spacerun:yes'>
                </span>(Write in full)
            </td>
        </tr>
        <tr height=34 style='mso-height-source:userset;height:25.5pt'>
        </tr>
        <tr height=18 style='mso-height-source:userset;height:13.5pt'>
            <td height=18 class=xl6728742 style='height:13.5pt'>&nbsp;</td>
            <td class=xl6828742 style='border-top:none'>From</td>
            <td class=xl6628742 style='border-top:none;border-left:none'>To</td>
        </tr>

        <input type="hidden" value="{{ $itemno = 0 }}">
        @forelse ($user->pdsLearningDevelopment->sortByDesc('LDidfrom') as $lnd)
            <input type="hidden" value="{{ $itemno = $loop->iteration }}">
            @if ($itemno < 20)
                <tr height=33 style='mso-height-source:userset;height:16pt'>
                    <td colspan=4 height=33 class=xl16128742 width=407
                        style='border-right:.5pt solid black;
                  height:22.5pt;width:307pt'>
                        {{ $lnd->LDtitle }}</td>
                    <td class=xl9328742 style='border-top:none;border-left:none'>
                        {{ date('m-d-Y', strtotime($lnd->LDidfrom)) }}</td>
                    <td class=xl9328742 style='border-top:none;border-left:none'>
                        {{ date('m-d-Y', strtotime($lnd->LDidto)) }}</td>
                    <td class=xl7528742 style='border-top:none;border-left:none'>{{ $lnd->LDnumhour }}</td>
                    <td class=xl7628742 style='border-top:none;border-left:none'>{{ $lnd->LDtype }}</td>
                    <td colspan=3 class=xl11028742 width=236
                        style='border-right:1.0pt solid black;
                  border-left:none;width:177pt'>
                        {{ $lnd->LDconducted }}</td>
                </tr>
            @endif
        @empty
        @endforelse

        @for ($i = $itemno; $i < 20; $i++)
            <tr height=33 style='mso-height-source:userset;height:16pt'>
                <td colspan=4 height=33 class=xl16128742 width=407
                    style='border-right:.5pt solid black;
              height:22.5pt;width:307pt'>&nbsp;</td>
                <td class=xl9328742 style='border-top:none;border-left:none'>&nbsp;</td>
                <td class=xl9328742 style='border-top:none;border-left:none'>&nbsp;</td>
                <td class=xl7528742 style='border-top:none;border-left:none'>&nbsp;</td>
                <td class=xl7628742 style='border-top:none;border-left:none'>&nbsp;</td>
                <td colspan=3 class=xl11028742 width=236
                    style='border-right:1.0pt solid black;
              border-left:none;width:177pt'>&nbsp;</td>
            </tr>
        @endfor

        <tr height=17 style='height:12.75pt'>
            <td colspan=11 height=17 class=xl9528742
                style='border-right:1.0pt solid black;
              height:12.75pt'>(Continue on separate sheet if
                necessary)</td>
        </tr>
        <tr height=30 style='mso-height-source:userset;height:16pt'>
            <td colspan=11 height=30 class=xl16328742 width=936
                style='border-right:1.0pt solid black;
              height:22.5pt;width:703pt'>VIII.<span
                    style='mso-spacerun:yes'> </span>OTHER
                INFORMATION</td>
        </tr>
        <tr height=45 style='mso-height-source:userset;height:33.75pt'>
            <td height=45 class=xl8928742 style='height:33.75pt;border-top:none'>31.</td>
            <td class=xl9028742 width=214 style='border-top:none;width:161pt'>SPECIAL
                SKILLS and HOBBIES</td>
            <td class=xl9128742 width=22 style='border-top:none;width:17pt'>32.</td>
            <td colspan=5 class=xl9028742 width=438 style='border-right:.5pt solid black;
              width:328pt'>
                NON-ACADEMIC DISTINCTIONS /
                RECOGNITION<span style='mso-spacerun:yes'>
                </span>(Write in full)</td>
            <td class=xl9128742 width=21 style='border-top:none;border-left:none;
              width:16pt'>33.
            </td>
            <td colspan=2 class=xl9028742 width=215 style='border-right:1.0pt solid black;
              width:161pt'>
                MEMBERSHIP IN
                ASSOCIATION/ORGANIZATION<span style='mso-spacerun:yes'>
                </span>(Write in full)</td>
        </tr>

        <input type="hidden" value="{{ $itemno = 0 }}">
        @forelse ($user->pdsOtherInformation as $other)
            <input type="hidden" value="{{ $itemno = $loop->iteration }}">
            @if ($itemno < 7)

            <tr height=33 style='mso-height-source:userset;height:16pt'>
                <td colspan=2 height=33 class=xl14428742 width=240
                    style='border-right:.5pt solid black;
                  height:22.5pt;width:181pt'>{{ $other->Ospecial }}</td>
                <td colspan=6 class=xl14928742 width=460
                    style='border-right:.5pt solid black;
                  border-left:none;width:345pt'>{{ $other->Ononacad }}</td>
                <td colspan=3 class=xl11028742 width=236
                    style='border-right:1.0pt solid black;
                  border-left:none;width:177pt'>{{ $other->Omemship }}</td>
            </tr>
            @endif
        @empty
        @endforelse

        @for ($i = $itemno; $i < 7; $i++)

        <tr height=33 style='mso-height-source:userset;height:16pt'>
            <td colspan=2 height=33 class=xl14428742 width=240
                style='border-right:.5pt solid black;
              height:22.5pt;width:181pt'>&nbsp;</td>
            <td colspan=6 class=xl14928742 width=460
                style='border-right:.5pt solid black;
              border-left:none;width:345pt'>&nbsp;</td>
            <td colspan=3 class=xl11028742 width=236
                style='border-right:1.0pt solid black;
              border-left:none;width:177pt'>&nbsp;</td>
        </tr>
        @endfor

        <tr height=15 style='mso-height-source:userset;height:11.25pt'>
            <td colspan=11 height=15 class=xl9528742
                style='border-right:1.0pt solid black;
              height:11.25pt'>(Continue on separate sheet if
                necessary)</td>
        </tr>
        <tr height=38 style='mso-height-source:userset;height:24.5pt'>
            <td colspan=2 height=38 class=xl9828742 width=240
                style='border-right:1.0pt solid black;
              height:24.5pt;width:181pt'>SIGNATURE</td>
            <td colspan=4 class=xl11628742 style='border-right:1.0pt solid black;
              border-left:none'>
                &nbsp;</td>
            <td colspan=2 class=xl18628742 style='border-left:none'>DATE</td>
            <td colspan=3 class=xl11628742 style='border-right:1.0pt solid black'>&nbsp;</td>
        </tr>
        <tr height=13 style='mso-height-source:userset;height:9.75pt'>
            <td height=13 class=xl6528742 style='height:9.75pt'></td>
            <td class=xl6528742></td>
            <td class=xl6528742></td>
            <td class=xl6528742></td>
            <td class=xl6528742></td>
            <td class=xl6528742></td>
            <td class=xl6528742></td>
            <td class=xl6528742></td>
            <td class=xl6528742></td>
            <td class=xl6528742></td>
            <td class=xl9228742><span style='mso-spacerun:yes'></span>CS FORM 212
                (Revised 2017), Page 3 of 4</td>
        </tr>
        <![if supportMisalignedColumns]>
        <tr height=0 style='display:none'>
            <td width=26 style='width:20pt'></td>
            <td width=214 style='width:161pt'></td>
            <td width=22 style='width:17pt'></td>
            <td width=145 style='width:109pt'></td>
            <td width=72 style='width:54pt'></td>
            <td width=71 style='width:53pt'></td>
            <td width=71 style='width:53pt'></td>
            <td width=79 style='width:59pt'></td>
            <td width=21 style='width:16pt'></td>
            <td width=32 style='width:23pt'></td>
            <td width=183 style='width:137pt'></td>
        </tr>
        <![endif]>
    </table>

</div>
