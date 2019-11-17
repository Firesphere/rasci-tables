<td id="$ID-$Subsidiary" class="team $FirstLast $EvenOdd $SelectedRASCI($Subsidiary)">
    <% if $CurrentUser.inGroup('administrators') && not $Comparison %>
        <select name="rasci-value[]" title="$Title" class="rasci-value">
            <option value=""></option>
            <option value="R-$ID-$Subsidiary"
                    <% if $SelectedRASCI($Subsidiary) == 'R' %>selected="selected"<% end_if %>>
                R
            </option>
            <option value="A-$ID-$Subsidiary"
                    <% if $SelectedRASCI($Subsidiary) == 'A' %>selected="selected"<% end_if %>>
                A
            </option>
            <option value="S-$ID-$Subsidiary"
                    <% if $SelectedRASCI($Subsidiary) == 'S' %>selected="selected"<% end_if %>>
                S
            </option>
            <option value="C-$ID-$Subsidiary"
                    <% if $SelectedRASCI($Subsidiary) == 'C' %>selected="selected"<% end_if %>>
                C
            </option>
            <option value="I-$ID-$Subsidiary"
                    <% if $SelectedRASCI($Subsidiary) == 'I' %>selected="selected"<% end_if %>>
                I
            </option>
        </select>
    <% else %>
        $SelectedRASCI($Subsidiary)
    <% end_if %>
</td>
<% if $Comparison %>
    <% with $Comparison %>
        <td id="$Up.ID-$Subsidiary-$ID" class="comparison $Up.FirstLast $Up.EvenOdd
            $CompareValue($Subsidiary, $Up.ID)">
            <% if $CompareValue($Subsidiary, $Up.ID) != 'striped' %>
                <i>$CompareValue($Subsidiary, $Up.ID)
                    <% if $CompareValue($Subsidiary, $Up.ID) != 'Not set' && $Up.SelectedRASCI($Subsidiary) != $CompareValue($Subsidiary, $Up.ID) && $CompareValue($Subsidiary, $Up.ID) %>
                        <b>(!)</b>
                    <% end_if %>
                </i>
            <% end_if %>
        </td>
    <% end_with %>
<% end_if %>
